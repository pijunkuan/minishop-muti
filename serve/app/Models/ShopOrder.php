<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    const ORDER_STATUS_PENDING = "pending";
    const ORDER_STATUS_PAID = "paid";
    const ORDER_STATUS_CLOSED = "closed";

    const orderStatusMap = [
      self::ORDER_STATUS_PENDING => "待支付",
      self::ORDER_STATUS_PAID => "已支付",
      self::ORDER_STATUS_CLOSED => "已关闭",
    ];

    public function items()
    {
        return $this->hasMany(ShopOrderItem::class,"shop_order_id");
    }

    public function payments()
    {
        return $this->hasMany(ShopOrderPayment::class,"shop_order_no","no");
    }
}
