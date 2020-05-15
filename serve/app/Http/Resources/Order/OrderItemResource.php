<?php

namespace App\Http\Resources\Order;

use App\Models\ProductVariant;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ori_variant = ProductVariant::find($this['variant_id']);
        $img_url = null;
        if ($ori_variant) {
            if ($img = $ori_variant->product->product_images()->orderBy('sort', 'asc')->first()) $img_url = $img->image->url;
        }
        return [
            "variant_id"=>$this['variant_id'],
            "product_title" => $this['product_title'],
            "variant_title" => $this['variant_title'],
            "price" => $this['price'],
            "img_url" => $img_url,
            "product_unit" => $this['product_unit'],
            "quantity" => $this['quantity'],
            "total" => $this['quantity'] * $this['price']
        ];
    }
}
