<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderSuborderItem extends Model
{
    public $table="app_order_suborder_items";
    public $timestamps = false;
    protected $guarded = [];

    public function suborder()
    {
        return $this->belongsTo(OrderSuborder::class,"suborder_id");
    }
}
