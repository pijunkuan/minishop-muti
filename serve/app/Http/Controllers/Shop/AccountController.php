<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\AdminContent;
use App\Models\SysAccountSetting;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function config()
    {
        return SysAccountSetting::first();
    }

    public function contrast()
    {
        return $template = AdminContent::where('code', 'contrast')->value('content');
    }

    public function img2base64(Request $request)
    {
        if($request->get('url')){
            $img = $request->get('url');
            $file = file_get_contents($img);
            $base64 = base64_encode($file);
            return $base64;
        }else{
            return null;
        }
    }
}
