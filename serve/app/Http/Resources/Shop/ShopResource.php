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
        $shop_level = $this['level'];
        $level = null;
        if($shop_level){
            $level = [
                "level_name"=>$shop_level->level['level_name'],
                "exp_at"=>$shop_level['exp_at']
            ];
        }
        return [
            "shop_id"=>$this['id'],
            "shop_name"=>$this['shop_name'],
            "shop_url"=>"{$this['shop_url']}",
            "host"=>config('shop_base.shop_base_host'),
            "status"=>Shop::shopStatusMap[$this['status']],
            "status_code"=>$this['status'],
            "active"=>$this['active'],
            "level"=>$level
        ];
    }
}
