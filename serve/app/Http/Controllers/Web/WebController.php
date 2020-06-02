<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SysAccountSetting;
use App\Models\SysCenterSetting;
use App\Models\SysHomeSetting;
use App\Models\SysSystemSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function web(Request $request)
    {
        $shop = $request->get('ori_shop');
        $shop_template = $shop->templates()->where('active', true)->first();
        if ($shop_template) {
            $template = $shop_template->template;
            $file = $template['template_file'];
            return view('shop', [
                "file" => $file,
                "title"=>$shop['shop_name']
            ]);
        }
    }

    public function center(Request $request)
    {
        $config = SysCenterSetting::first();
        $file = "templates/center/";
        return view("center", [
            "file" => $file,
            "title" => $config['title'],
            "meta" => $config['meta'],
            "logo" => $config['logo'],
            "description" => $config['description']
        ]);
    }

    public function account(Request $request)
    {
        $file = "templates/account/";
        $config = SysAccountSetting::first();
        return view('account', [
            "file" => $file,
            "title" => $config['title'],
            "meta" => $config['meta'],
            "logo" => $config['logo'],
            "description" => $config['description']
        ]);
    }

    public function admin_system()
    {
        $file = "templates/system/";
        $config = SysSystemSetting::first();
        return view('system', [
            "file" => $file,
            "title" => $config['title'],
            "meta" => $config['meta'],
            "logo" => $config['logo'],
            "description" => $config['description']
        ]);
    }

    public function home()
    {
        $file = "templates/home/";
        $config = SysHomeSetting::first();
        return view('home', [
            "file" => $file,
            "title" => $config['title'],
            "meta" => $config['meta'],
            "logo" => $config['logo'],
            "description" => $config['description']
        ]);
    }

}
