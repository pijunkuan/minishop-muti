<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletIncome extends Model
{
    const WAY_ALIPAY = "alipay";
    const WAY_WXPAY = "wxpay";

    const wayMap = [
      self::WAY_ALIPAY => "支付宝",
      self::WAY_WXPAY => "微信",

    ];

    protected $guarded = [];

    public function wallet()
    {
        return $this->belongsTo(UserWallet::class, "wallet_id");
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }
}
