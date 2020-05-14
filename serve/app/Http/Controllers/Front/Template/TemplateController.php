<?php

namespace App\Http\Controllers\Front\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function get(Request $request){
        $shop = $request->get('ori_shop');
        $template = $shop->templates()->where('active',1)->first();
        return $this->jsonSuccessResponse($template->setting['setting']);
    }
}
