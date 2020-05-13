<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Level\LevelResource;
use App\Http\Resources\System\Template\TemplateListResource;
use App\Models\SysLevel;
use App\Models\SysPaymentMethod;
use App\Models\SysTemplate;
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

    public function template_list(Request $request)
    {
        $templates = SysTemplate::where('active',true)->orderBy('created_at','desc')->get();
        return $this->jsonSuccessResponse(TemplateListResource::collection($templates));
    }
}
