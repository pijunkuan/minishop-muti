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
}
