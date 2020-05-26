<?php

namespace App\Http\Resources\Shop\Sms;

use App\Models\ShopSmsSign;
use Illuminate\Http\Resources\Json\JsonResource;

class SmsSignResource extends JsonResource
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
            "sign_id"=>$this['id'],
            "shop_id"=>$this['shop']['shop_name'],
            "sign_name"=>$this['sign_name'],
            "active"=>$this['active'],
            "status"=>$this['status'],
            "status_value"=>ShopSmsSign::signStatusMap[$this['status']],
            "created_at"=>$this['created_at']->toDateTimeString()
        ];
    }
}
