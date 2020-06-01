<?php

namespace App\Http\Controllers\Admin\Pages\Account;

use App\Http\Controllers\Controller;
use App\Models\SysAccountSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountSettingController extends Controller
{
    public function show()
    {
        return $this->jsonSuccessResponse(SysAccountSetting::first());
    }

    public function update(Request $request)
    {
        $setting = SysAccountSetting::first();
        $validator = Validator::make($request->all(),[
            "title"=>"nullable",
            "meta"=>"nullable",
            "logo"=>"nullable",
            "description"=>"nullable",
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
