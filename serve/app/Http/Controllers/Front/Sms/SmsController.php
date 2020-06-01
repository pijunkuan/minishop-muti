<?php

namespace App\Http\Controllers\Front\Sms;

use App\Events\Shop\Sms\SmsSendEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{
    public function verification(Request $request)
    {
        $shop = $request->get('ori_shop');
        $validator = Validator::make($request->all(),[
            "mobile"=>"required"
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            $code = random_int(1000,9999);
            Cache::put("FRONT_SMS_CODE{$data['mobile']}",$code,300);
            event(new SmsSendEvent($shop,$data['mobile'],"customer_verification",['code'=>$code]));
        }
        return $this->jsonSuccessResponse();
    }
}
