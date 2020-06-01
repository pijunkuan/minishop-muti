<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
            ]);
        }
    }

    public function center(Request $request)
    {
        $web_name = "MINISHOP";
        $file = "templates/center/";
        return view("center",[
            "file" => $file,
            "web_name"=>$web_name
        ]);
    }

    public function account(Request $request)
    {
        $file = "templates/account/";
        return view('account', [
            "file" => $file
        ]);
    }

//    public function css(Request $request)
//    {
//        $shop = $request->get('ori_shop');
//        $shop_template = $shop->templates()->where('active', true)->first();
//        if ($shop_template) {
//            $template = $shop_template->template;
//            $file = $template['template_file'];
//           return redirect(asset($file.'css/'.$request->route()->parameter('file')));
//        }
//    }
//    public function js(Request $request)
//    {
//        $shop = $request->get('ori_shop');
//        $shop_template = $shop->templates()->where('active', true)->first();
//        if ($shop_template) {
//            $template = $shop_template->template;
//            $file = $template['template_file'];
//            return redirect(asset($file.'js/'.$request->route()->parameter('file')));
//        }
//    }
}
