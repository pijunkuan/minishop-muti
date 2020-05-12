<?php

namespace App\Http\Resources\Shop\Level;

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
        $min_price = $this->variants()->where('sys_level_id',$this['id'])->min('price');

        return [
            "level_name"=>$this['level_name'],
            "level_img_url"=>$this['level_img_url'],
            "level_content"=>$this['level_content'],
            "price"=>$min_price,
            "variants"=>LevelVariantResource::collection($this->variants)
        ];
    }
}
