<?php

namespace App\Http\Resources\Order;

use App\Models\ProductVariant;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCalcResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'address' => $this['address'],
            'items_amount' => $this['items_amount'],
            'shipments_amount' => $this['shipments_amount'],
            'discounts_amount' => $this['discounts_amount'],
            'amount' => $this['amount'],
            'items' => OrderItemResource::collection($this['items']),
            "suborders"=>new SuborderResource($this['suborders'])
        ];
    }
}
