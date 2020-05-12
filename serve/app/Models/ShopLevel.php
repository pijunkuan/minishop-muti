<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopLevel extends Model
{
    public $table="shop_levels";

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function level()
    {
        return $this->belongsTo(SysLevel::class,'sys_level_id');
    }
}
