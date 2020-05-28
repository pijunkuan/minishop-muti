<?php

namespace App\Http\Resources\User\Refund;

use App\Models\UserWalletRefundList;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RefundResource extends JsonResource
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
            "mobile"=>$this['wallet']['user']['mobile'],
            "no"=>$this['no'],
            "pay_no"=>$this['pay_no'],
            "record_no"=>$this['record_no'],
            "order_no"=>$this['order_no'],
            "status"=>$this['status'],
            "status_value"=>UserWalletRefundList::recordStatusMap[$this['status']],
            "amount"=>$this['amount'],
            "fee"=>$this['fee'],
            "content"=>$this['content'],
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
