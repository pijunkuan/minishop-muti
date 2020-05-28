<?php

namespace App\Http\Resources\User\Refund;

use App\Http\Resources\OrderRefundRecord\OrderRefundRecordResource;
use App\Models\OrderRefundRecord;
use App\Models\UserWalletRefundList;
use Illuminate\Http\Resources\Json\JsonResource;

class RefundDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $income_info = [
            "amount"=>$this['income']['amount'],
            "fee"=>$this['income']['fee'],
        ];
        $order = $this->order;
        $order_amount = $order['amount'];
        $refund_amount_pending = $order->refund_records()->where('status', OrderRefundRecord::RECORD_STATUS_PENDING)->sum('amount');
        $refund_amount_success = $order->refund_records()->where('status', OrderRefundRecord::RECORD_STATUS_SUCCESS)->sum('amount');
        $refund_amount_rest = $order_amount - $refund_amount_pending - $refund_amount_success;
        $order_info = [
            "order_amount" => $order_amount,
            "refund_amount_pending" => $refund_amount_pending,
            "refund_amount_success" => $refund_amount_success,
            "refund_amount_rest" =>$refund_amount_rest,
            "refund_record_list"=> OrderRefundRecordResource::collection($order->refund_records)
        ];
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
            "income"=>$income_info,
            "order"=>$order_info,
            "created_at"=>$this['created_at']->toDateTimeString(),
        ];
    }
}
