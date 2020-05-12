<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Level\LevelResource;
use App\Models\SysLevel;
use App\Models\SysPaymentMethod;
use Illuminate\Http\Request;

class SysController extends Controller
{
    public function payment()
    {
        $payments = SysPaymentMethod::where('active',true)->get();
        return $this->jsonSuccessResponse($payments);
    }

    public function level()
    {
        $levels = SysLevel::with(['variants'])->get();
        return $this->jsonSuccessResponse(LevelResource::collection($levels));
    }
}
