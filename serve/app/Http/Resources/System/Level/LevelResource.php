<?php

namespace App\Http\Resources\System\Level;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $variants = LevelVariantResource::collection($this['variants']);
        $price = collect($variants)->min('unit_price');
        return [
            "id"=>$this['id'],
            "level_name"=>$this['level_name'],
            "level_img_url"=>$this['level_img_url'],
            "level_content"=>$this['level_content'],
            "pic_limit"=>$this['pic_limit'],
            "item_limit"=>$this['item_limit'],
            "domain_edit"=>$this['domain_edit'],
            "unlock_days"=>$this['unlock_days'],
            "fee_rate"=>$this['fee_rate'],
            "sms_amount"=>$this['sms_amount'],
            "price"=>$price,
            "variants"=>$variants
        ];
    }
}
