<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysPlugin extends Model
{
    public $table = "sys_plugins";

    public function variants()
    {
        return $this->hasMany(SysPluginVariant::class , "sys_plugin_id");
    }
}
