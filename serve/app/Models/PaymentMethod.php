<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $table = "app_payment_methods";
    protected $guarded = [];
    protected $casts = [
        "extra"=>"array"
    ];
    public $timestamps = false;
}
