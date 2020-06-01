<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysAccountSetting extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $hidden = ['id'];
}
