<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysSystemSetting extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $hidden = ['id'];
}
