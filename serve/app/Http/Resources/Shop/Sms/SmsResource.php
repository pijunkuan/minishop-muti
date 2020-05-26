<?php

namespace App\Http\Resources\Shop\Sms;

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
        $shop = $request->get('ori_shop');
        $active = false;
        if($shop){
            $active =  $shop->sms_templates()->find($this['id'])?true:false;
        }
        return [
            "sms_template_id"=>$this['id'],
            "template_code"=>$this['template_code'],
            "template_name"=>$this['template_name'],
            "template_type"=>$this['template_type'],
            "template_content"=>$this['template_content'],
            "active"=>$active
        ];
    }
}
