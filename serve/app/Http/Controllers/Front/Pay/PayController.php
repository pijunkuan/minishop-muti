<?php

namespace App\Http\Controllers\Front\Pay;

use App\Events\Order\Pay\PaySuccessEvent;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use App\Models\Wallet;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $payment = OrderPayment::where('no', $request->route()->parameter('no'))->firstOrFail();
        if ($payment->status !== OrderPayment::PAYMENT_STATUS_PENDING) return view('Pay.info', ["message" => "无法支付（支付单状态错误）"]);
        switch ($payment->payment_method) {
            case "wallet":
                $customer = $payment->customer;
                if ($customer->wallets()->sum('amount') < $payment['pay_amount']) return view('Pay.info', ["message" => "账户余额不足"]);
                $rs = $customer->wallets()->create(['amount' => 0 - $payment->pay_amount * 1.00, 'type' => Wallet::WALLET_OUT, "content" => "支付编号：{$payment->no} ， 订单编号：{$payment->order->no}"]);
                event(new PaySuccessEvent($payment, $rs->no));
                break;
            default:
                return view('Pay.info', ["message" => "错误的支付方式！"]);
                break;
        }
        return view('Pay.info', ["message" => "支付成功！"]);
    }
}
