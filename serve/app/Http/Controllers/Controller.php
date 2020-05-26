<?php

namespace App\Http\Controllers;

use App\Http\Response\jsonResponse;
use App\Models\SysSmsTemplate;
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
        $data = $request->all();
        $sms_content = SysSmsTemplate::find(1);
        $content = $sms_content['template_content'];
        $content = SmsService::template($content,$data);
        return $this->jsonSuccessResponse($content);
    }
}
