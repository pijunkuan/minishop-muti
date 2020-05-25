<?php

namespace App\Http\Resources\User\User;

use App\Http\Resources\User\Wallet\WalletResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this['id'],
            'mobile'=>$this['mobile'],
            "wallet"=>new WalletResource($this['wallet']),
            "created_at"=>$this['created_at']->toDateTimeString()
        ];
    }
}
