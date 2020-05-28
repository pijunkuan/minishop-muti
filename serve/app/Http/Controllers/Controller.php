<?php

namespace App\Http\Controllers;

use App\Events\Shop\Sms\SmsAmountEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Http\Response\jsonResponse;
use App\Models\Shop;
use App\Models\SysSmsTemplate;
use App\Services\PingXX\PingXX;
use App\Services\YuanPian\SmsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, jsonResponse;

    public function test_sms(Request $request)
    {
//        echo mb_strlen(null);
//        event(new SmsAmountEvent(13,'out',"测试短信时间","13033339999"));
//        $shop = Shop::find(13);
//        event(new SmsSendEvent($shop, "13032319853", "order_create", ['code' => '1234']));
    }

    public function order_refund_test(Request $request)
    {
//        $params = [
//            "pay_no" => $request->get('pay_no'),
//            "refund_no"=>$request->get('refund_no'),
//            "content" => "协商退款",
//            "amount" => $request->get('amount')
//        ];
//        $pingxx = new PingXX(env('FRONT_PING_ID'));
//        return $pingxx->refund_create($params);
//        return $pingxx->refund_retrieve($params);
    }
}
