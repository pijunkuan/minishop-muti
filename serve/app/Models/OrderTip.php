<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderTip extends Model
{
    public $table = "app_order_tips";

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class,"order_id");
    }
}
