<?php

namespace App\Http\Resources\User\Income;

use App\Models\UserWalletIncome;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "pay_no" => $this['pay_no'],
            "clear_no"=>$this['clear_no'],
            "mobile"=>$this['wallet']['user']['mobile'],
            "shop_name"=>$this['shop_name'],
            "no" => $this['no'],
            "way" => $this['way'],
            "way_value" => UserWalletIncome::wayMap[$this['way']],
            "amount" => $this['amount'],
            "fee" => $this['fee'],
            "fee_rate" => $this['fee_rate']."%",
            "content" => $this['content'],
            "created_at" => $this['created_at']->toDateTimeString(),
        ];
    }
}
