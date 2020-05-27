<?php

namespace App\Http\Controllers\Admin\Sms;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Sms\SmsSignCollection;
use App\Http\Resources\Shop\Sms\SmsSignResource;
use App\Http\Resources\System\Sms\SmsResource;
use App\Http\Resources\System\Sms\SmsVariantResource;
use App\Models\ShopSmsSign;
use App\Models\SysSms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SmsController extends Controller
{
    public function index(Request $request)
    {
        $lists = new SysSms();
        $lists = $lists->get();
        return $this->jsonSuccessResponse(SmsResource::collection($lists));
    }

    public function update(Request $request)
    {
        $sms = SysSms::findOrFail($request->route()->parameter('sm'));

        $validator = Validator::make($request->all(), [
            "sms_name" => "nullable",
            "sms_content" => "nullable",
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                $sms->update($data);
            }
        }
        $sms->refresh();
        return $this->jsonSuccessResponse(new SmsResource($sms));

    }

    public function variant_index(Request $request)
    {
        $sms = SysSms::findOrFail($request->route()->parameter('sms'));
        return $this->jsonSuccessResponse(SmsVariantResource::collection($sms->variants));
    }

    public function variant_update(Request $request)
    {
        $sms = SysSms::findOrFail($request->route()->parameter('sms'));
        $variant = $sms->variants()->findOrFail($request->route()->parameter('variant'));
        $validator = Validator::make($request->all(), [
            'price' => 'nullable|numeric',
            'time' => 'nullable|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                if (isset($data['time']))
                    if ($sms->variants()
                        ->where('id', '<>', $variant['id'])
                        ->where('time', $data['time'])
                        ->first()) return $this->jsonErrorResponse(422, "该条数已存在");
                $variant->update($data);
            }
        }
        $sms->refresh();
        return $this->jsonSuccessResponse(SmsVariantResource::collection($sms->variants));
    }

    public function variant_store(Request $request)
    {
        $sms = SysSms::findOrFail($request->route()->parameter('sms'));
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'time' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if ($sms->variants()->where('time', $data['time'])->first()) return $this->jsonErrorResponse(422, "该条数已存在");
            $sms->variants()->create($data);
        }
        $sms->refresh();
        return $this->jsonSuccessResponse(SmsVariantResource::collection($sms->variants));
    }

    public function variant_destroy(Request $request)
    {
        $sms = SysSms::findOrFail($request->route()->parameter('sms'));
        if ($sms->variants()->count() <= 1) return $this->jsonErrorResponse(422, "必须拥有一个价格");
        $variant = $sms->variants()->findOrFail($request->route()->parameter('variant'));
        $variant->delete();
        return $this->jsonSuccessResponse();
    }

    public function sign_index(Request $request)
    {
        $signs = new ShopSmsSign();
        if ($request->has('sign_name')) $signs = $signs->where('sign_name', $request->get('sign_name'));
        if ($request->has('stats')) $signs = $signs->where('status', $request->get('status'));
        $signs = $signs->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new SmsSignCollection($signs));
    }

    public function sign_update(Request $request)
    {
        $sign = ShopSmsSign::findOrFail($request->route()->parameter('sign'));
        if(in_array($sign['status'],[ShopSmsSign::SIGN_STATUS_SUCCESS, ShopSmsSign::SIGN_STATUS_FAILED])) return $this->jsonErrorResponse(422,"该签名已经审核");
        $validator = Validator::make($request->all(), [
            'status' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (!in_array($data['status'], [ShopSmsSign::SIGN_STATUS_SUCCESS, ShopSmsSign::SIGN_STATUS_FAILED])) return $this->jsonErrorResponse(422, "非法状态码");
            $sign->update($data);

        }
        $sign->refresh();
        return $this->jsonSuccessResponse(new SmsSignResource($sign));
    }
}
