<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminTemplate extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        'setting'=>'array'
    ];
}
