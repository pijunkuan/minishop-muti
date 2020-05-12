<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysPaymentMethod extends Model
{
    public $timestamps = false;

    protected $casts = [
        "active"=>"boolean"
    ];

    protected $hidden = ["active"];
}
