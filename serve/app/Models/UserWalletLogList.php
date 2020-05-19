<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletLogList extends Model
{
    const LOG_TYPE_IN = "in";
    const LOG_TYPE_OUT = "out";

    const logTypeMap = [
        self::LOG_TYPE_IN => "收入",
        self::LOG_TYPE_OUT => "支出"
    ];

    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(UserWallet::class,"wallet_id");
    }
}
