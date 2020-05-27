<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSmsAccount extends Model
{
    public $timestamps = false;

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }
}
