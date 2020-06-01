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
}
