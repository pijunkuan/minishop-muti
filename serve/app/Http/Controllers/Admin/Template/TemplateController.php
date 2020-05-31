<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\Template\TemplateListCollection;
use App\Http\Resources\System\Template\TemplateListResource;
use App\Http\Resources\System\Template\TemplateVariantResource;
use App\Models\SysTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $templates = new SysTemplate();

        $templates = $templates->orderBy('created_at', "desc")->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new TemplateListCollection($templates));
    }

    public function update(Request $request)
    {
        $template = SysTemplate::findOrFail($request->route()->parameter('template'));
        $validator = Validator::make($request->all(), [
            "template_name" => "nullable",
            "template_content" => "nullable",
            "active" => "nullable|boolean",
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                $template->update($data);
            }
        }
        $template->refresh();
        return $this->jsonSuccessResponse(new TemplateListResource($template));
    }

    public function variant_store(Request $request)
    {
        $template = SysTemplate::findOrFail($request->route()->parameter('template'));
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'time' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if ($template->variants()->where('time', $data['time'])->first()) return $this->jsonErrorResponse(422, "该时间已存在");
            $template->variants()->create($data);
        }
        $template->refresh();
        return $this->jsonSuccessResponse(TemplateVariantResource::collection($template->variants));
    }

    public function variant_update(Request $request)
    {
        $template = SysTemplate::findOrFail($request->route()->parameter('template'));
        $variant = $template->variants()->findOrFail($request->route()->parameter('variant'));
        $validator = Validator::make($request->all(), [
            'price' => 'nullable|numeric',
            'time' => 'nullable|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                if (isset($data['time']))
                    if ($template->variants()
                        ->where('id', '<>', $variant['id'])
                        ->where('time', $data['time'])
                        ->first()) return $this->jsonErrorResponse(422, "该时间已存在");
                $variant->update($data);
            }
        }
        $template->refresh();
        return $this->jsonSuccessResponse(TemplateVariantResource::collection($template->variants));
    }

    public function variant_destroy(Request $request)
    {
        $template = SysTemplate::findOrFail($request->route()->parameter('template'));
        if($template->variants()->count() <= 1) return $this->jsonErrorResponse(422,"必须拥有一个价格");
        $variant = $template->variants()->findOrFail($request->route()->parameter('variant'));
        $variant->delete();
        return $this->jsonSuccessResponse();
    }

    public function variant_index(Request $request)
    {
        $template = SysTemplate::findOrFail($request->route()->parameter('template'));
        return $this->jsonSuccessResponse(TemplateVariantResource::collection($template->variants));
    }
}
