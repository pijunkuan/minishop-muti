<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            "name"=>$this['img_name'],
            "url" => $this['url'],
            "thumbnail"=>$this['url']."?x-oss-process=image/resize,h_80",
            "medium"=>$this['url']."?x-oss-process=image/resize,h_400",
            "bytes"=>$this['img_bytes']
        ];
    }
}
