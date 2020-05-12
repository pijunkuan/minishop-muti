<?php

namespace App\Http\Requests\Shop\Shop;


use App\Http\Requests\FormRequest;
use App\Models\SysLevelVariant;
use App\Models\SysPluginVariant;
use App\Models\SysTemplateVariant;

class OrderStoreRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "shop_id"=>[
                "required",
                "exists:shops,id",
                function($attribute,$value,$fail){
                    if(!auth('users')->user()->shops()->find($value)) return $fail('没有此商铺');
                }
            ],
            "items"=>"array|required",
            "items.*.type"=>"required",
            "items.*.item_id"=>[
                "required",
                function($attribute, $value, $fail){
                    preg_match('/items\.(\d+)\.item_id/', $attribute, $m);
                    $index = $m[1];
                    $type = $this->input('items')[$index]['type'];
                    switch($type){
                        case "template":
                            if(!SysTemplateVariant::where('id',$value)->first()) return $fail('不存在此模板');
                            break;
                        case "level":
                            if(!SysLevelVariant::where('id',$value)->first()) return $fail('不存在此版本');
                            break;
                        case "plugin":
                            if(!SysPluginVariant::where('id',$value)->first()) return $fail('不存在此插件');
                            break;
                        default:
                            return $fail('类型错误');
                            break;
                    }
                }
            ]
        ];
    }

    public function attributes()
    {
        return [
            "shop_id"=>"商铺id",
            "items.*.type"=>"类型",
            "items.*.item_id"=>"购买id"
        ];
    }
}
