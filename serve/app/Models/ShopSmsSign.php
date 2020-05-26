<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSmsSign extends Model
{
    const SIGN_STATUS_PENDING = "pending";
    const SIGN_STATUS_SUCCESS = "success";
    const SIGN_STATUS_FAILED = "failed";

    const signStatusMap = [
        self::SIGN_STATUS_PENDING => "审核中",
        self::SIGN_STATUS_SUCCESS => "审核通过",
        self::SIGN_STATUS_FAILED => " 审核失败",
    ];

    protected $guarded = [];

    protected $casts = [
        "active"=>"boolean"
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }
}
