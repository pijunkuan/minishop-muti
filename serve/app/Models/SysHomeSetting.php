<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysHomeSetting extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected $hidden = ['id'];
}
