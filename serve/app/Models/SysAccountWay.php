<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysAccountWay extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        "active" => "boolean"
    ];
}
