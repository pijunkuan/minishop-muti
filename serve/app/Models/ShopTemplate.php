<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopTemplate extends Model
{
    public $table = "shop_templates";

    public $casts = [
        "active" => "boolean",
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');

    }

    public function template()
    {
        return $this->belongsTo(SysTemplate::class, "sys_template_id");
    }

    public function setting()
    {
        return $this->hasOne(ShopTemplateSetting::class,"shop_template_id");
    }

}
