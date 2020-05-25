<?php

namespace App\Http\Resources\User\Wallet;

use App\Models\UserWalletClearList;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
            "mobile"=>$this['user']['mobile'],
            "wallet_id"=>$this['id'],
            "balance"=>$this['balance'],
            "locked_amount"=>$this->clear_lists()->where('status',UserWalletClearList::CLEAR_STATUS_PENDING)->sum('amount'),
            "withdraw_total"=>$this->withdraw_lists()->where('status',UserWalletWithdrawCashList::CASH_STATUS_SUCCESS)->sum('amount')
        ];
    }
}
