<?php

namespace App\Http\Resources\Shop\Authenticate;

use App\Models\ShopAuthenticate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "type"=>$this['type'],
            "type_value"=>ShopAuthenticate::authTypeMap[$this['type']],
            "name"=>$this['name'],
            "company_name"=>$this['company_name'],
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
