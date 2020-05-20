<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletWithdrawCashList extends Model
{
    protected $guarded = [];
    protected $casts = [
        "account"=>"array"
    ];
    const CASH_STATUS_PENDING = "pending";
    const CASH_STATUS_SUCCESS = "success";
    const CASH_STATUS_FAILED = "failed";

    const cashStatusMap = [
        self::CASH_STATUS_PENDING =>"在途",
        self::CASH_STATUS_SUCCESS =>"已到账",
        self::CASH_STATUS_FAILED =>"体现失败",
    ];

    public function wallet()
    {
        return $this->belongsTo(UserWallet::class,"wallet_id");
    }
}
