<?php

namespace App\Http\Requests\Shop\Shop;


use App\Http\Requests\FormRequest;
use App\Models\ShopOrder;

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
            "order_no" => [
                "required",
                "exists:shop_orders,no",
                function ($attribute, $value, $fail) {
                    $order = ShopOrder::where('no',$value)->first();
                    if($order->status != ShopOrder::ORDER_STATUS_PAID) return $fail('该订单未支付');
                    if($order->shop || $order->item['type'] != 'level') return $fail('无法创建商城');
                }
            ],
            "shop_name" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "shop_name" => "商铺名称"
        ];
    }
}
