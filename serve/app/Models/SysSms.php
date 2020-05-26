<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysSms extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function variants()
    {
        return $this->hasMany(SysSmsVariant::class,"sys_sms_id");
    }
}
