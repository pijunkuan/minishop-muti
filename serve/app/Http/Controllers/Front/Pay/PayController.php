<?php

namespace App\Http\Controllers\Front\Pay;

use App\Events\Order\Pay\PaySuccessEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Events\User\Wallet\OrderEvent;
use App\Events\User\Wallet\Refund\WalletRefundConfirmEvent;
use App\Http\Controllers\Controller;
use App\Models\OrderPayment;
use App\Models\UserWalletRefundList;
use App\Models\Wallet;
use App\Services\PingXX\PingXX;
use Illuminate\Http\Request;
use Pingpp\Util\Util;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $payment = OrderPayment::where('no', $request->route()->parameter('no'))->firstOrFail();
        if ($payment->status == OrderPayment::PAYMENT_STATUS_SUCCESS) return view('Pay.front_info', ["message" => "该订单已支付", "url" => url('checksuc')]);
        if ($payment->status !== OrderPayment::PAYMENT_STATUS_PENDING) return view('Pay.front_info', ["message" => "无法支付（支付单状态错误）", "url" => url('')]);

        switch ($payment->payment_method) {
            case "wallet":
                $customer = $payment->customer;
                if ($customer->wallets()->sum('amount') < $payment['pay_amount']) return view('Pay.front_info', ["message" => "账户余额不足", "url" => url('')]);
                $rs = $customer->wallets()->create(['amount' => 0 - $payment->pay_amount * 1.00, 'type' => Wallet::WALLET_OUT, "content" => "支付编号：{$payment->no} ， 订单编号：{$payment->order->no}"]);
                event(new PaySuccessEvent($payment, $rs->no));
                break;
            case "alipay";
                $pingxx = new PingXX(env("FRONT_PING_ID"));
                $params = [
                    "no"=>$payment['no'],
                    "amount"=>$payment['pay_amount'],
                    "url"=>url('checksuc')
                ];
                $charge = $pingxx->m_alipay($params);
                return view('Pay.pay', [
                    "charge" => $charge,
                    "url"=>url('checksuc')
                ]);
                break;
            case "wxpay":
                $pingxx = new PingXX(env("FRONT_PING_ID"));
                if(isset($_GET['code'])){
                    $params = [
                        "no"=>$payment['no'],
                        "amount"=>$payment['pay_amount'],
                        "url"=>url('checksuc')
                    ];
                    $charge = $pingxx->m_wxpay($params,$_GET['code']);
                    return view('Pay.pay', [
                        "charge" => $charge,
                        "url"=>url('checksuc')
                    ]);
                }else{
                    $url = $pingxx->wx_getToken($payment['no']);
                    return view('Pay.wx', [
                        "amount" => $payment['pay_amount'],
                        "order_no" => $payment['no'],
                        "url"=>$url
                    ]);
                }
                break;
            default:
                return view('Pay.front_info', ["message" => "错误的支付方式！", "url" => url('')]);
                break;
        }
        return view('Pay.front_info', ["message" => "支付成功！", "url" => url('checksuc')]);
    }

    public function confirm(Request $request)
    {
        echo "pingxxwebhooks";
        $raw_data = file_get_contents('php://input');
        $headers = Util::getRequestHeaders();
        $signature = isset($headers['X-Pingplusplus-Signature']) ? $headers['X-Pingplusplus-Signature'] : null;
        $pingxx = new PingXX(env('FRONT_PING_ID'));
        $result = $pingxx->verify_signature($raw_data, $signature);
        if ($result == 1) {
            $event = json_decode($raw_data, true);
            $object = $event['data']['object'];
            switch ($event['type']) {
                case "charge.succeeded":
                    $charge = $pingxx->charge_retrieve($object['id']);
                    if (!$charge) return response()->json(['msg' => "no object"], 400);
                    if(!$charge['paid']) return response()->json(['msg' => "no paid"], 400);
                    $payment=OrderPayment::where("no",$charge['order_no'])->firstOrFail();
                    if($payment['status'] == OrderPayment::PAYMENT_STATUS_SUCCESS)return response()->json(['msg' => "already paid"], 400);
                    event(new PaySuccessEvent($payment, $charge['id']));
                    event(new OrderEvent($payment));
                    $order = $payment->order;
                    $shop = $order->shop;
                    $customer = $order->customer;
                    $data = ["order_no"=>$order['no'],"amount"=>$order['amount']];
                    event(new SmsSendEvent($shop['id'],$customer['mobile'],"order_paid",$data));
                    event(new SmsSendEvent($shop['id'],$shop['user']['mobile'],"admin_order_paid",$data));
                    break;
                case "refund.succeeded":
                    $list = UserWalletRefundList::where('refund_no',$object['id'])->firstOrFail();
                    if($list['status'] == UserWalletRefundList::RECORD_STATUS_SUCCESS)return response()->json(['msg' => "already succeeded"], 400);
                    $params = [
                        "pay_no"=>$list['pay_no'],
                        "refund_no"=>$list['refund_no']
                    ];
                    $charge = $pingxx->refund_retrieve($params);
                    if(!$charge['succeed']) return response()->json(['msg'=>"not succeeded"],422);
                    event(new WalletRefundConfirmEvent($list,'success'));
                    break;
                default:
                    return response()->json(['msg' => "error type"], 400);
                    break;
            }
            return $this->jsonSuccessResponse($event);
        } elseif ($result == 0) {
            return response()->json(['msg' => "verification failed"], 400);
        } else {
            return response()->json(['msg' => "verification error"], 400);
        }
    }

    public function test(Request $request)
    {
//        $payment = OrderPayment::where('no',$request->route()->parameter('no'))->firstOrFail();
//        event(new OrderEvent($payment));

//        $pingxx = new PingXX(env("FRONT_PING_ID"));
//        $params = [
//            "no"=>"test123".time(),
//            "amount"=>10,
//            "url"=>url('checksuc')
//        ];
//        $charge = $pingxx->m_wxpay($params);
//        $data = [
//            "order"=>[
//                "amount"=>$charge['amount'],
//                "order_no"=>$charge['order_no']
//            ],
//            "url"=>$charge['credential']['wx_pub_qr']
//        ];
//        return view('Pay.wx',["data"=>$data]);
////        $charge = $pingxx->m_alipay($params);
//        return $this->jsonSuccessResponse($charge);
    }
}
