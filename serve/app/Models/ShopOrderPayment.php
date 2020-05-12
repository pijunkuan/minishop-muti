<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopOrderPayment extends Model
{
    const PAYMENT_STATUS_PENDING = "pending";
    const PAYMENT_STATUS_PAID = "paid";
    const PAYMENT_STATUS_CLOSED = "closed";

    const paymentStatusMap = [
        self::PAYMENT_STATUS_PENDING => "待支付",
        self::PAYMENT_STATUS_PAID => "已支付",
        self::PAYMENT_STATUS_CLOSED => "已关闭",
    ];

    public function shopOrder()
    {
        return $this->belongsTo(ShopOrder::class,'shop_order_no','no');
    }
}
