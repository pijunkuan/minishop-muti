<?php

namespace App\Http\Resources\Shop\Authenticate\Admin;

use App\Models\ShopAuthenticate;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminAuthenticateResource extends JsonResource
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
            "shop_name"=>$this['shop']['shop_name'],
            "type"=>$this['type'],
            "type_value"=>ShopAuthenticate::authTypeMap[$this['type']],
            "name"=>$this['name'],
            "id_no"=>$this['id_no'],
            "address"=>$this['address'],
            "mobile"=>$this['mobile'],
            "telephone"=>$this['telephone'],
            "images"=>$this['images'],
            "status"=>$this['status'],
            "status_value"=>ShopAuthenticate::authStatusMap[$this['status']],
            "created_at"=>$this['created_at']->toDateTimeString()
        ];
    }
}
