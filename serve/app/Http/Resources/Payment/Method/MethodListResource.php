<?php

namespace App\Http\Resources\Payment\Method;

use Illuminate\Http\Resources\Json\JsonResource;

class MethodListResource extends JsonResource
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
            "code"=>$this['payment_method_code'],
            "title"=>$this['payment_method_title'],
            "status"=>$this['active']?"使用中":"待配置"
        ];
    }
}
