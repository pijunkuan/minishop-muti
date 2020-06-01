<?php

namespace App\Http\Controllers\Admin\SysContent;

use App\Http\Controllers\Controller;
use App\Models\AdminContent;
use Illuminate\Http\Request;

class SysContentController extends Controller
{
    public function show()
    {
        $template = AdminContent::where('code', 'contrast')->first();
        return $this->jsonSuccessResponse($template['content']);
    }

    public function update(Request $request)
    {
        if ($request->has('content')) AdminContent::where('code', 'contrast')->update(['content' => $request->get('content')]);
        return $this->jsonSuccessResponse($request->get('content'));
    }
}
