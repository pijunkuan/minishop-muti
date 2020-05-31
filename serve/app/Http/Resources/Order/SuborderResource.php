<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class SuborderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "shipments_amount"=>$this['shipments_amount'],
            "items_amount"=>$this['items_amount'],
            "shipment_name"=>$this['shipment_name'],
            "items"=>OrderItemResource::collection($this['items'])
        ];
    }
}
