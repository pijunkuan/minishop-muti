<?php

namespace App\Http\Requests\Shop\Shop;


use App\Http\Requests\FormRequest;
use App\Models\SysLevelVariant;
use App\Models\SysPaymentMethod;
use App\Models\SysPluginVariant;
use App\Models\SysSmsVariant;
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
                "nullable",
                "exists:shops,id",
                function($attribute,$value,$fail){
                    if(!auth('users')->user()->shops()->find($value)) return $fail('没有此商铺');
                }
            ],
            "payment_method"=>[
                "required",
                function($attribute, $value, $fail){
                    if(!SysPaymentMethod::where('active',true)->where('method_code',$value)->first()) return $fail($attribute.' 支付代码错误，或支付未启用');
                }
            ],
            "item"=>"required",
            "item.type"=>"required",
            "item.item_id"=>[
                "required",
                function($attribute, $value, $fail){
                    $type = $this->input('item')['type'];
                    switch($type){
                        case "template":
                            if(!SysTemplateVariant::where('id',$value)->first()) return $fail('不存在此模板');
                            if(!$this->input('shop_id')) return $fail('商铺id 不可为空');
                            break;
                        case "level":
                            if(!SysLevelVariant::where('id',$value)->first()) return $fail('不存在此版本');
                            break;
                        case "plugin":
                            if(!SysPluginVariant::where('id',$value)->first()) return $fail('不存在此插件');
                            if(!$this->input('shop_id')) return $fail('商铺id 不可为空');
                            break;
                        case "sms":
                            if(!SysSmsVariant::where('id',$value)->first()) return $fail("不存在此短信包");
                            if(!$this->input('shop_id')) return $fail('商铺id 不可为空');
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
