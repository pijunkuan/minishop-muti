<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentRule extends Model
{
    public $table="app_shipment_rules";
    public $timestamps=false;
    protected $guarded = [];
    protected $casts = [
        "area"=>"array"
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class,"shipment_id");
    }

}
