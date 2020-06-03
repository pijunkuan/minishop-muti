<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\SysCenterSetting;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function config()
    {
        return SysCenterSetting::first();
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
