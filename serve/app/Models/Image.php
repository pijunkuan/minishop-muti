<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public $table = "app_images";
    protected $guarded = [];

    public function getUrlAttribute()
    {
        if($this->img_file){
            return Storage::url($this->img_file);
        }elseif($this->img_link){
            return $this->img_link;
        }else{
            return null;
        }

    }
}
