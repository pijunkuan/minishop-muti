<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSmsLog extends Model
{
    const SMS_TYPE_IN="in";
    const SMS_TYPE_OUT="out";

    const smsTypeMap = [
        self::SMS_TYPE_IN=>"充值",
        self::SMS_TYPE_OUT=>"消费"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
