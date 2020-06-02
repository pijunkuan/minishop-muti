<?php

namespace App\Http\Controllers\Admin\Pages\Center;

use App\Http\Controllers\Controller;
use App\Models\SysCenterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CenterSettingController extends Controller
{
    public function show()
    {
        return $this->jsonSuccessResponse(SysCenterSetting::first());
    }

    public function update(Request $request)
    {
        $setting = SysCenterSetting::first();
        $validator = Validator::make($request->all(),[
            "title"=>"nullable",
            "meta"=>"nullable",
            "logo"=>"nullable",
            "description"=>"nullable",
            "service_qr_code"=>"nullable",
            "ico"=>"nullable",
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                $setting->update($data);
            }
        }
        $setting->refresh();
        return $this->jsonSuccessResponse($setting);
    }
}
