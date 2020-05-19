<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletClearList extends Model
{
    protected $guarded = [];
    const CLEAR_STATUS_PENDING = "pending";
    const CLEAR_STATUS_SUCCESS = "success";

    const clearStatusMap = [
        self::CLEAR_STATUS_PENDING=>"冻结中",
        self::CLEAR_STATUS_SUCCESS=>"已结算",
    ];

    public function wallet()
    {
        return $this->belongsTo(UserWallet::class,"wallet_id");
    }
}
