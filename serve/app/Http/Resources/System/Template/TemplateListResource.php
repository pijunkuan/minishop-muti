<?php

namespace App\Http\Resources\System\Template;

use Illuminate\Http\Resources\Json\JsonResource;

class TemplateListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $file = $this['template_file'];
        $price = $this->variants()->min('price');
        return [
            "template_name"=>$this['template_name'],
            "template_img"=>asset("{$file}img.jpg"),
            "price"=>$price
        ];
    }
}
