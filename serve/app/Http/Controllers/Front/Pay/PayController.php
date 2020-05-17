<?php

namespace App\Http\Controllers\Front\Pay;

use App\Events\Order\Pay\PaySuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use App\Models\Wallet;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function wallet(Request $request)
    {
        $customer = auth('customers')->user();
        $payment = $customer->payments()->where('app_order_payments.no', $request->route()->parameter('no'))->firstOrFail();
        if ($payment->status !== OrderPayment::PAYMENT_STATUS_PENDING) return $this->jsonErrorResponse(404, "无法支付（支付单状态错误）");
        if ($customer->wallets()->sum('amount') < $payment['pay_amount']) return $this->jsonErrorResponse(404, "余额不足");
        $rs = $customer->wallets()->create([
            'amount' => 0 - $payment->pay_amount * 1.00,
            'type' => Wallet::WALLET_OUT,
            "content" => "支付编号：{$payment->no} ， 订单编号：{$payment->order->no}"
        ]);
        event(new PaySuccessEvent($payment, $rs->no));
        return $this->jsonSuccessResponse(null, "支付成功");
    }
}
