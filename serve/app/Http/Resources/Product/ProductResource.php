<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = $this->product_images()->orderBy('sort', 'asc')->first();
        $img_url = null;
        if ($image) {
            $img_url = $image->image->url;
        }
        $low_variant = $this->variants()->orderBy("price", "asc")->first();
        $quantity = $this->variants()->sum('quantity');
        return [
            "id"=>$this->id,
            "product_title" => $this->product_title,
            "img" => $img_url,
            "thumbnail"=>$img_url?$img_url."?x-oss-process=image/resize,h_80":null,
            "medium"=>$img_url?$img_url."?x-oss-process=image/resize,h_400":null,
            "price" => $low_variant['price'],
            "stock"=>$quantity,
            "on_sale"=>$this->on_sale
        ];
    }
}
