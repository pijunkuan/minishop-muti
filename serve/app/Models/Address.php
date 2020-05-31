<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $table="app_addresses";
    protected $guarded = [];
    protected $casts = [
        "default"=>"boolean"
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,"customer_id");
    }

    public function getFullAddressAttribute()
    {
        return "{$this->province} {$this->city} {$this->district} {$this->detail}";
    }

}
