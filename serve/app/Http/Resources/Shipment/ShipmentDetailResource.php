<?php

namespace App\Http\Resources\Shipment;

use App\Models\Shipment;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $methods = collect(config('shop_shipment_methods.methods'));
        $method = $methods->where('code',$this['shipment_code'])->first();
        return [
            "id" => $this['id'],
            "shipment_code" => $this['shipment_code'],
            "shipment_title" => $method['title'],
            "shipment_name" => $this['shipment_name'],
            "cost_type" => $this['need_cost']?Shipment::shipmentCostMap[$this['cost_type']]:"无运费",
            "cost_type_code" => $this['cost_type'],
            "need_cost" => $this['need_cost'],
            "rules"=>ShipmentRuleResource::collection($this['rules'])
        ];
    }
}
