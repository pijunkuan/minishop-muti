<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use App\Models\OrderRefund;
use App\Models\ProductVariant;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetail extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $address = [
            "name" => $this['address']['name'],
            "mobile" => $this['address']['mobile'],
            "address" => "{$this['address']['province']} {$this['address']['city']} {$this['address']['district']} {$this['address']['detail']}",
            "zip" => $this['address']['zip'],
        ];

        $refund = null;
        if ($this['refund_status']) {
            switch ($this['refund_status']) {
                case OrderRefund::REFUND_STATUS_REFUNDING:
                    $refund = $this->refunds()->where('status', OrderRefund::REFUND_STATUS_REFUNDING)->first();
                    break;
                case OrderRefund::REFUND_STATUS_REFUNDED:
                    $refund = $this->refunds()->where('status', OrderRefund::REFUND_STATUS_REFUNDED)->first();
                    break;
            }
        }
        return [
            "address" => $address,
            "items"=>OrderItemResource::collection($this['items']),
            "suborders" => SuborderResource::collection($this['suborders']),
            "payments" => OrderPaymentResource::collection($this->payments()->orderBy('created_at', 'desc')->get()),
            "shipments" => OrderShipmentResource::collection($this['shipments']),
            "items_amount" => $this['items_amount'],
            "shipments_amount" => $this['shipments_amount'],
            "discounts_amount" => $this['discounts_amount'],
            "ori_amount" => $this['items_amount'] + $this['shipments_amount'] - $this['discounts_amount'],
            "amount" => $this['amount'],
            "closed_reason" => $this['closed_reason'],
            "remark" => $this['remark'],
            "status" => $this['status'],
            "status_value" => Order::orderStatusMap[$this['status']],
            "refund_status" => $this['refund_status'] ?: null,
            "refund_status_value" => $this['refund_status'] ? Order::refundStatusMap[$this['refund_status']] : null,
            "send_at" => is_null($this['send_at']) ? null : $this['send_at'],
            "pay_at" => is_null($this['pay_at']) ? null : $this['pay_at'],
            "refund_at" => $refund ? $refund['created_at']->toDateTimeString() : null,
            "success_at" => is_null($this['success_at']) ? null : $this['success_at'],
            "created_at" => is_null($this['created_at']) ? null : $this['created_at']->toDateTimeString(),
            "updated_at" => is_null($this['updated_at']) ? null : $this['updated_at']->toDateTimeString(),
            "closed_at" => is_null($this['closed_at']) ? null : $this['closed_at'],
        ];
    }
}
