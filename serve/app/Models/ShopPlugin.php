<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopPlugin extends Model
{
    public $table="shop_plugins";

    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

    public function plugins()
    {
        return $this->belongsTo(SysPlugin::class,'sys_plugin_id');
    }
}
