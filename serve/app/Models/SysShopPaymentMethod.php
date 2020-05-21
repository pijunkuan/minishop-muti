<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysShopPaymentMethod extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        "need_setting" => "boolean",
        "need_wallet" => "boolean",
        "active" => "boolean",
    ];
}
