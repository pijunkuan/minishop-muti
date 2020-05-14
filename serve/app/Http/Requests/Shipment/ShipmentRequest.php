<?php

namespace App\Http\Requests\Shipment;


use App\Http\Requests\FormRequest;

class ShipmentRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "shipment_code" => [
                "required",
                function ($attribute, $value, $fail) {
                    if (!in_array($value, config('shop_shipment_methods.codes')))
                        return $fail('非法代码code');
                }
            ],
            "shipment_name" => "required",
            "need_cost" => [
                "required",
                "boolean",
                function ($attribute, $value, $fail) {
                    if ($value) {
                        if (!$this->input('cost_type')) return $fail('cost_type 不可为空');
                        if (!$this->input('rules')) return $fail('rules 不可为空');
                    }
                }
            ],
            "cost_type" => [
                "nullable",
                function ($attribute, $value, $fail) {
                    if (!in_array($value, config('shop_shipment_methods.cost_types')))
                        return $fail('非法类型cost_type');
                }
            ],
            "rules" => "nullable|array",
            "rules.*.area" => "required|array",
            "rules.*.price_1" => "required|numeric",
            "rules.*.value_1" => "required|numeric",
            "rules.*.price_2" => "required|numeric",
            "rules.*.value_2" => "required|numeric",

        ];
    }
}
