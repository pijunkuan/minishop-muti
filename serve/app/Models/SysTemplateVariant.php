<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysTemplateVariant extends Model
{
    public $table="sys_template_variants";

    public function template()
    {
        return $this->belongsTo(SysTemplate::class,'sys_template_id');
    }
}
