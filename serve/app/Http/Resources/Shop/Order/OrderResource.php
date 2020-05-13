<?php

namespace App\Http\Resources\Shop\Order;

use App\Models\ShopOrder;
use App\Models\ShopOrderPayment;
use App\Models\SysPaymentMethod;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $payment = $this->payments()->whereIn('status',[ShopOrderPayment::PAYMENT_STATUS_PAID,ShopOrderPayment::PAYMENT_STATUS_PENDING])->first();
        return [
            "id"=>$this['id'],
            "no"=>$this['no'],
            "ori_amount"=>$this['ori_amount'],
            "discounts_amount"=>$this['discounts_amount'],
            "amount"=>$this['amount'],
            "shop_id"=>$this['shop_id'],
            "shop_name"=>$this['shop_name'],
            "status_code"=>$this['status'],
            "status"=>ShopOrder::orderStatusMap[$this['status']],
            "item"=>$this['item'],
            "payment"=>[
                "no"=>$payment['no'],
                "pay_no"=>$payment['pay_no'],
                "payment_method"=>$payment['payment_method'],
                "payment_method_value"=>SysPaymentMethod::where('method_code',$payment['payment_method'])->value('method_title'),
                "amount"=>$payment['amount'],
                "status_code"=>$payment['status'],
                "status"=>ShopOrderPayment::paymentStatusMap[$payment['status']],
                "pay_at"=>$payment['pay_at']?$payment['pay_at']:null ,
                "created_at"=>$payment['created_at']->toDateTimeString(),
            ],
            "created_at"=>$this['created_at']->toDateTimeString(),

        ];
    }
}
