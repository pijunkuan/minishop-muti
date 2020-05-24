<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysLevelVariant extends Model
{
    public $table = "sys_level_variants";
    public $timestamps = false;
    protected $guarded = [];

    public function level(){
        return $this->belongsTo(SysLevel::class,'sys_level_id');
    }
}
