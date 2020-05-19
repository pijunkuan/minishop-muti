<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function accounts()
    {
        return $this->hasMany(UserWalletAccount::class,"wallet_id");
    }

    public function incomes()
    {
        return $this->hasMany(UserWalletIncome::class,"wallet_id");
    }

    public function clear_lists()
    {
        return $this->hasMany(UserWalletClearList::class,"wallet_id");
    }

    public function refund_lists()
    {
        return $this->hasMany(UserWalletRefundList::class,"wallet_id");
    }

    public function log_lists()
    {
        return $this->hasMany(UserWalletLogList::class,"wallet_id");
    }

    public function withdraw_lists()
    {
        return $this->hasMany(UserWalletWithdrawCashList::class,"wallet_id");
    }
}
