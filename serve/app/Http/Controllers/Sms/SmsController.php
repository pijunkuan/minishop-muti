<?php

namespace App\Http\Controllers\Sms;

use App\Events\Sms\SmsEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsController extends Controller
{
    public function verification_code(Request $request)
    {
        event(new SmsEvent("verification",$request->get('mobile')));
        return $this->jsonSuccessResponse();
    }
}
