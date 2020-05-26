<?php

namespace App\Http\Resources\System\Sms;

use Illuminate\Http\Resources\Json\JsonResource;

class SmsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $variants = SmsVariantResource::collection($this['variants']);
        $price = collect($variants)->min('unit_price');
        return [
            "sms_id"=>$this['id'],
            "sms_name"=>$this['sms_name'],
            "sms_content"=>$this['sms_content'],
            "price"=>$price,
            "variants"=>$variants
        ];
    }
}
