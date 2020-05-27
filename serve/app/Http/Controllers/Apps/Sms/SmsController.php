<?php

namespace App\Http\Controllers\Apps\Sms;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Sms\SmsLogListCollection;
use App\Http\Resources\Shop\Sms\SmsResource;
use App\Http\Resources\Shop\Sms\SmsSignCollection;
use App\Http\Resources\Shop\Sms\SmsSignResource;
use App\Models\ShopSmsSign;
use App\Models\SysSmsTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{
    public function index()
    {
        $datas = new SysSmsTemplate();
        $datas = $datas->get()->groupBy('template_type');
        $sms_templates = array();
        foreach ($datas as $key => $data) {
            $sms_templates[$key] = SmsResource::collection($data);
        }
        return $this->jsonSuccessResponse($sms_templates);
    }

    public function update(Request $request)
    {
        $shop = $request->get('ori_shop');
        $sms_template = SysSmsTemplate::findOrFail($request->route()->parameter('sms'));
        $shop_sms_template = $shop->sms_templates()->find($sms_template['id']);
        if ($shop_sms_template) {
            $shop->sms_templates()->detach($sms_template['id']);
        } else {
            $shop->sms_templates()->attach($sms_template['id']);
        }
        $shop->refresh();
        return $this->jsonSuccessResponse(SmsResource::collection($shop->sms_templates));
    }

    public function sign_index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $signs = $shop->signs()->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new SmsSignCollection($signs));
    }

    public function sign_store(Request $request)
    {
        $shop = $request->get('ori_shop');
        $validator = Validator::make($request->all(), [
            "sign_name" => "required"
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            $sign = $shop->signs()->create($data);
        }
        $sign->refresh();
        return $this->jsonSuccessResponse(new SmsSignResource($sign));
    }

    public function sign_destroy(Request $request)
    {
        $shop = $request->get('ori_shop');
        $sign = $shop->signs()->findOrFail($request->route()->parameter('sign'));
        if ($sign['status'] == ShopSmsSign::SIGN_STATUS_SUCCESS) return $this->jsonErrorResponse(422, "审核通过的签名不能删除");
        $sign->delete();
        return $this->jsonSuccessResponse();
    }

    public function sign_update(Request $request)
    {
        $shop = $request->get('ori_shop');
        $sign = $shop->signs()->findOrFail($request->route()->parameter('sign'));
        if ($sign['status'] != ShopSmsSign::SIGN_STATUS_SUCCESS) return $this->jsonErrorResponse(422, "该签名未通过审核，不能启用");
        $validator = Validator::make($request->all(), [
            "active" => "required|boolean"
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (isset($data['active']) && $data('active')) {
                if ($sign['status'] == ShopSmsSign::SIGN_STATUS_FAILED)
                    return $this->jsonErrorResponse(422, "未通过审核的签名不能启用");
                $shop->signs()->update('active', false);
            }
            $sign = $sign->update($data);
        }
        return $this->jsonSuccessResponse(new SmsSignResource($sign));
    }

    public function log(Request $request)
    {
        $shop = $request->get('ori_shop');
        $logs = $shop->sms_logs();

        $logs = $logs->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new SmsLogListCollection($logs));
    }


}
