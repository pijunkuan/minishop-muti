<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $address = $this['address'];
        return [
            "id" => $this['id'],
            "no" => $this['no'],
            "name" => $address['name'],
            "mobile" => $address['mobile'],
            "address" => "{$address['province']} {$address['city']} {$address['district']} {$address['detail']}",
            "zip"=>$address['zip'],
            "status"=>$this['refund_status']?$this['refund_status']:$this['status'],
            "status_value"=>$this['refund_status']?Order::refundStatusMap[$this['refund_status']]:Order::orderStatusMap[$this['status']],
            "amount"=>$this['amount'],
            "items_amount"=>$this['items_amount'],
            "shipments_amount"=>$this['shipments_amount'],
            "discounts_amount"=>$this['discounts_amount'],
            "items" => OrderItemResource::collection($this['items']),
            "suborders"=>SuborderResource::collection($this['suborders']),
            "remark" => $this['remark'],
            "created_at" => $this['created_at']->toDateTimeString(),
        ];
    }
}
