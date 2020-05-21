<?php

namespace App\Http\Resources\User\Withdraw;

use App\Models\SysAccountWay;
use App\Models\UserWalletAccount;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Resources\Json\JsonResource;

class WithdrawListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $way = SysAccountWay::where("way",$this['way'])->first();
        return [
            "amount"=>$this['amount'],
            "fee"=>$this['fee'],
            "way"=>$this['way'],
            "way_value"=>$way['title'],
            "no"=>$this['no'],
            "content"=>$this['content'],
            "status"=>$this['status'],
            "status_value"=>UserWalletWithdrawCashList::cashStatusMap[$this['status']],
            "account_full"=>"{$this['account']['name']} | {$this['account']['id']} {$this['account']['bank']}",
            "account"=>[
                "name"=>$this['account']['name'],
                "id"=>$this['account']['id'],
                "bank"=>$this['account']['bank'],
            ],
            "success_at"=>$this['success_at']??null,
            "created_at"=>$this['created_at']->toDateTimeString()
        ];
    }
}
