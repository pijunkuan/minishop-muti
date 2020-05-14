<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{


    public function put(Request $request)
    {
        $file = 'template\template.json';
        if($request->has('template')){
            $theme = $request->get('template');
            if(!count($theme)) $theme = null ;
            Storage::put($file,json_encode($theme));
        }
        return $this->jsonSuccessResponse($theme);
    }
}
