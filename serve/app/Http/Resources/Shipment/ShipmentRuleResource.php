<?php

namespace App\Http\Resources\Shipment;

use App\Models\Shipment;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentRuleResource extends JsonResource
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
            "id"=>$this['id'],
            "area"=>$this['area'],
            "unit"=>Shipment::shipmentUnitMap[$this['shipment']['cost_type']],
            "price_1"=>$this['price_1'],
            "value_1"=>$this['value_1'],
            "price_2"=>$this['price_2'],
            "value_2"=>$this['value_2'],
        ];
    }
}
