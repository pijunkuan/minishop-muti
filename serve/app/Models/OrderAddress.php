<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    public $table = "app_order_addresses";
    public $timestamps = false;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class,"order_id");
    }

    public function getFullAddressAttribute()
    {
        return "{$this->province} {$this->city} {$this->district} {$this->detail}";
    }
}
