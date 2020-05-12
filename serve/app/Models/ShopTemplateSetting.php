<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopTemplateSetting extends Model
{
    public $table="shop_template_settings";
    public $timestamps = false;

    public function shop_template()
    {
        return $this->belongsTo(ShopTemplate::class,"shop_template_id");
    }
}
