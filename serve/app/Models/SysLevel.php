<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysLevel extends Model
{
    public $table = "sys_levels";

    protected $casts = [
        "level_content" => "array",
        "domain_edit" => "boolean"
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function variants()
    {
        return $this->hasMany(SysLevelVariant::class, "sys_level_id");
    }
}
