<?php

namespace App\Http\Controllers\Admin\Pages\System;

use App\Http\Controllers\Controller;
use App\Models\SysSystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SystemSettingController extends Controller
{
    public function show()
    {
        return $this->jsonSuccessResponse(SysSystemSetting::first());
    }

    public function update(Request $request)
    {
        $setting = SysSystemSetting::first();
        $validator = Validator::make($request->all(),[
            "title"=>"nullable",
            "meta"=>"nullable",
            "logo"=>"nullable",
            "description"=>"nullable",
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
