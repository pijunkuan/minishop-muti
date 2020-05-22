<?php

namespace App\Http\Resources\User\Clear;

use App\Models\UserWalletClearList;
use Illuminate\Http\Resources\Json\JsonResource;

class ClearListResource extends JsonResource
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
            "amount"=>$this['amount'],
            "fee"=>$this['fee'],
            "order_count"=>$this['order_count'],
            "status"=>$this['status'],
            "status_value"=>UserWalletClearList::clearStatusMap[$this['status']],
            "unlocked_in"=>($this['status'] == UserWalletClearList::CLEAR_STATUS_SUCCESS)?0:0 - now()->diffInDays($this['unlocked_at']),
            "unlocked_at"=>$this['unlocked_at'],
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
