<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysLevel extends Model
{
    public $table = "sys_levels";
    public function variants()
    {
        return $this->hasMany(SysLevelVariant::class , "sys_level_id");
    }
}
