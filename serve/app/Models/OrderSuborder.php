<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSuborder extends Model
{
    public $table="app_order_suborders";
    public $timestamps = false;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class,"order_id");
    }

    public function items()
    {
        return $this->hasMany(OrderSuborderItem::class,"suborder_id");
    }
}
