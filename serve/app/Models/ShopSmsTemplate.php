<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopSmsTemplate extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }

    public function sms_template()
    {
        return $this->belongsTo(SysSmsTemplate::class,"sms_template_id");
    }
}
