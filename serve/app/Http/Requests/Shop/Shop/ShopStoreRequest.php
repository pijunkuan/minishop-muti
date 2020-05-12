<?php

namespace App\Http\Requests\Shop\Shop;


use App\Http\Requests\FormRequest;

class ShopStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "shop_name"=>"required",
        ];
    }

    public function attributes()
    {
        return [
          "shop_name"=>"商铺名称"
        ];
    }
}
