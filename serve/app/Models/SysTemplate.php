<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysTemplate extends Model
{
    public $table="sys_templates";

    public function variants()
    {
        return $this->hasMany(SysTemplateVariant::class, "sys_template_id");
    }
}
