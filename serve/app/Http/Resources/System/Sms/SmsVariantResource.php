<?php

namespace App\Http\Resources\System\Sms;

use Illuminate\Http\Resources\Json\JsonResource;

class SmsVariantResource extends JsonResource
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
            "variant_id"=>$this['id'],
            "price"=>$this['price'],
            "time"=>$this['time'],
            "unit_price"=>round($this['price']/$this['time'],2)
        ];
    }
}
