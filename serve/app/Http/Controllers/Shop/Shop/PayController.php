<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Models\ShopOrderPayment;
use App\Services\PingXX\PingXX;
use Illuminate\Http\Request;

class PayController extends Controller
{
    private const APP_ID = "app_PyXfXTDiXzPKKmnb";

    public function pay(Request $request)
    {
        $payment = ShopOrderPayment::where('no', $request->route()->parameter('payment_no'))->first();
        if (!$payment)
            return view('Pay.info',[
                "message"=>"不存在该支付单"
            ]);
        if ($payment->status == ShopOrderPayment::PAYMENT_STATUS_PAID)
            return view('Pay.info',[
                "message"=>"该订单已支付"
            ]);
        if ($payment->status == ShopOrderPayment::PAYMENT_STATUS_CLOSED)
            return view('Pay.info',[
                "message"=>"该订单已关闭"
            ]);

        $data = [
            "pay_no"=>$payment['pay_no'],
            "amount"=>$payment['amount'],
            "no"=>$payment['no'],
            "url"=>"http://google.de"
        ];
        switch($payment['payment_method']){
            case "alipay":
                $pingxx_serve = new PingXX(self::APP_ID);
                $charge = $pingxx_serve->pc_alipay($data);
                break;
            case "wxpay":

                break;
            default:
                return view('Pay.info',[
                    "message"=>"错误的支付代码"
                ]);
                break;
        }
        if($charge){
            return view('Pay.pay',[
                "charge"=>$charge
            ]);
        }else{
            return view('Pay.info',[
                "message"=>"支付参数有误，请重新创建"
            ]);
        }
    }

    public function confirm(Request $request)
    {
        echo "pingxxwebhooks";
    }
}
