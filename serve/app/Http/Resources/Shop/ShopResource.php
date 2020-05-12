<?php

namespace App\Http\Resources\Shop;

use App\Models\Shop;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            "shop_name"=>$this['shop_name'],
            "shop_url"=>"{$this['shop_url']}.min-eshop.vip",
            "status"=>Shop::shopStatusMap[$this['status']],
            "status_code"=>$this['status'],
            "active"=>$this['active'],
            "level"=>$this['level']
        ];
    }
}
