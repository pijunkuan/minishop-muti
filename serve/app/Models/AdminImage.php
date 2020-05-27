<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AdminImage extends Model
{
    protected $guarded = [];

    public function getUrlAttribute()
    {
        if($this->img_link){
            return $this->img_link;
        }elseif($this->img_file){
            return Storage::url($this->img_file);
        }else{
            return null;
        }
    }
}
