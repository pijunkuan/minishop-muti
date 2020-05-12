<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrderItem extends Model
{
    const ORDER_ITEM_TEMPLATE ="template";
    const ORDER_ITEM_LEVEL ="level";
    const ORDER_ITEM_PLUGIN ="plugin";

    const orderItemMap = [
        self::ORDER_ITEM_LEVEL => "商城等级",
        self::ORDER_ITEM_TEMPLATE => "商城模板",
        self::ORDER_ITEM_PLUGIN => "商城插件",
    ];

    public $timestamps = false;


    public function shopOrder()
    {
        return $this->belongsTo(ShopOrder::class,"shop_order_id");
    }
}
