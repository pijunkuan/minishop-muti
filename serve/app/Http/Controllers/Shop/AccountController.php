<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\SysAccountSetting;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function config()
    {
        return SysAccountSetting::first();
    }
}
