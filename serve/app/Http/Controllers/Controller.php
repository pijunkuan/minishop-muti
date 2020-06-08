<?php

namespace App\Http\Controllers;

use App\Http\Response\jsonResponse;
use App\Models\AdminTemplate;
use App\Models\SysHomeSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, jsonResponse;

    public function home_template()
    {
        $template = AdminTemplate::where('code', 'template')->first();
        return $template['setting'];
    }

    public function home_config()
    {
        return SysHomeSetting::first();
    }

    public function testfile(Request  $request)
    {
        return response()->file(public_path().'/templates/default/'.$request->route()->parameter('filename'));
    }
}
