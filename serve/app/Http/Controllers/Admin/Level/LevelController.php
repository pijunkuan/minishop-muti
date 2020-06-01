<?php

namespace App\Http\Controllers\Admin\Level;

use App\Http\Controllers\Controller;
use App\Http\Resources\System\Level\LevelResource;
use App\Http\Resources\System\Level\LevelVariantResource;
use App\Models\SysLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $lists = new SysLevel();
        $lists = $lists->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(LevelResource::collection($lists));
    }

    public function update(Request $request)
    {
        $level = SysLevel::findOrFail($request->route()->parameter('level'));
        $validator = Validator::make($request->all(), [
            "level_name" => "nullable",
            "level_img_url" => "nullable",
            "level_content" => "nullable|array",
            "pic_limit" => "nullable|numeric",
            "item_limit" => "nullable|numeric",
            "domain_edit" => "nullable|boolean",
            "unlock_days" => "nullable|numeric",
            "fee_rate" => "nullable|numeric",
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                $level->update($data);
            }
        }
        $level->refresh();
        return $this->jsonSuccessResponse(new LevelResource($level));
    }

    public function variant_index(Request $request)
    {
        $level = SysLevel::findOrFail($request->route()->parameter('level'));
        return $this->jsonSuccessResponse(LevelVariantResource::collection($level->variants));
    }

    public function variant_update(Request $request)
    {
        $level = SysLevel::findOrFail($request->route()->parameter('level'));
        $variant = $level->variants()->findOrFail($request->route()->parameter('variant'));
        $validator = Validator::make($request->all(), [
            'price' => 'nullable|numeric',
            'time' => 'nullable|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            if (count($data)) {
                if (isset($data['time']))
                    if ($level->variants()
                        ->where('id', '<>', $variant['id'])
                        ->where('time', $data['time'])
                        ->first()) return $this->jsonErrorResponse(422, "该时间已存在");
                $variant->update($data);
            }
        }
        $level->refresh();
        return $this->jsonSuccessResponse(LevelVariantResource::collection($level->variants));
    }

    public function variant_store(Request $request)
    {
        $level = SysLevel::findOrFail($request->route()->parameter('level'));
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'time' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            if ($level->variants()->where('time', $data['time'])->first()) return $this->jsonErrorResponse(422, "该时间已存在");
            $level->variants()->create($data);
        }
        $level->refresh();
        return $this->jsonSuccessResponse(LevelVariantResource::collection($level->variants));
    }

    public function variant_destroy(Request $request)
    {
        $level = SysLevel::findOrFail($request->route()->parameter('level'));
        if($level->variants()->count() <= 1) return $this->jsonErrorResponse(422,"必须拥有一个价格");
        $variant = $level->variants()->findOrFail($request->route()->parameter('variant'));
        $variant->delete();
        return $this->jsonSuccessResponse();
    }

}
