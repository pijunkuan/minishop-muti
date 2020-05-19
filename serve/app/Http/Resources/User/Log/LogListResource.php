<?php

namespace App\Http\Resources\User\Log;

use App\Models\UserWalletLogList;
use Illuminate\Http\Resources\Json\JsonResource;

class LogListResource extends JsonResource
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
            "type"=>$this['type'],
            "type_value"=>UserWalletLogList::logTypeMap[$this['type']],
            "amount"=>$this['amount'],
            "last_balance"=>$this['last_balance'],
            "next_balance"=>$this['next_balance'],
            "no"=>$this['no'],
            "content"=>$this['content'],
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
