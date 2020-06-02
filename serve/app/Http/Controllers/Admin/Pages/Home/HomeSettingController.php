<?php

namespace App\Http\Controllers\Admin\Pages\Home;

use App\Http\Controllers\Controller;
use App\Models\SysHomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeSettingController extends Controller
{
    public function show()
    {
        return $this->jsonSuccessResponse(SysHomeSetting::first());
    }

    public function update(Request $request)
    {
        $setting = SysHomeSetting::first();
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
