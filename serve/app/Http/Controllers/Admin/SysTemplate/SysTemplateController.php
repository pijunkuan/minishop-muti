<?php

namespace App\Http\Controllers\Admin\SysTemplate;

use App\Http\Controllers\Controller;
use App\Models\AdminTemplate;
use Illuminate\Http\Request;

class SysTemplateController extends Controller
{
    public function show()
    {
        $template = AdminTemplate::where('code', 'template')->first();
        return $this->jsonSuccessResponse($template['setting']);
    }

    public function update(Request $request)
    {
        if ($request->has('setting')) AdminTemplate::where('code', 'template')->update(['setting' => $request->get('setting')]);
        return $this->jsonSuccessResponse($request->get('setting'));
    }
}
