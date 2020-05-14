<?php

namespace App\Http\Resources\Shop\Template;

use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
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
            "id"=>$this['id'],
            "template_id"=>$this['template']['id'],
            "template_name"=>$this['template']['template_name'],
            "active"=>$this['active'],
            "exp_at"=>$this['exp_at'],
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
