<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysSmsVariant extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function sms()
    {
        return $this->belongsTo(SysSms::class,"sys_sms_id");
    }
}
