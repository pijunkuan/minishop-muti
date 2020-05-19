<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletAccount extends Model
{
    const ALIPAY = "alipay";
    const WXPAY = "wxpay";
    const BANK = "bank";


    protected $guarded = [];
    protected $casts = [
        "account"=>"array"
    ];


    public function wallet()
    {
        return $this->belongsTo(UserWallet::class,"wallet_id");
    }
}
