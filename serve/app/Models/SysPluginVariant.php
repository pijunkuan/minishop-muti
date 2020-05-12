<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysPluginVariant extends Model
{
    public $table = "sys_plugin_variants";

    public function plugin(){
        return $this->belongsTo(SysPlugin::class,'sys_plugin_id');
    }
}
