<?php

namespace App\Http\Controllers\Apps\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Template\TemplateResource;
use App\Http\Resources\System\Template\TemplateListResource;
use App\Models\SysTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $templates = $shop->templates;
        return $this->jsonSuccessResponse(TemplateResource::collection($templates));
    }

    public function show(Request $request)
    {
        $shop = $request->get('ori_shop');
        $template = $shop->templates()->findOrFail($request->route()->parameter('template'));
        return $this->jsonSuccessResponse($template['setting']['setting']);
    }

    public function update(Request $request)
    {
        $shop = $request->get('ori_shop');
        if (!$request->has('setting') || !$request->get('setting'))
            return $this->jsonErrorResponse(422, "setting不能为空");
        $template = $shop->templates()->findOrFail($request->route()->parameter('template'));
        $setting = $template['setting'];
        $setting->setting = $request->get('setting');
        $setting->save();
        $setting->refresh();
        return $this->jsonSuccessResponse($setting['setting']);
    }

    public function active(Request $request)
    {
        $shop = $request->get('ori_shop');
        DB::transaction(function()use($shop,$request){
            $shop->templates()->update(['active'=>false]);
            $template = $shop->templates()->findOrFail($request->route()->parameter('template'));
            $template->update(['active'=>true]);
        });
        return $this->jsonSuccessResponse();
    }

    public function cloud()
    {
        $templates = SysTemplate::where('active', true)->orderBy('created_at', 'desc')->get();
        return $this->jsonSuccessResponse(TemplateListResource::collection($templates));
    }


}
