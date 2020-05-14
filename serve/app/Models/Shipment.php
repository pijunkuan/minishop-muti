<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public $table = "app_shipments";
    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        "need_cost" => "boolean",
    ];

    const SHIPMENT_COST_NUMERIC = "numeric";
    const SHIPMENT_COST_WEIGHT = "weight";

    const shipmentCostMap = [
        self::SHIPMENT_COST_NUMERIC => "按件数",
        self::SHIPMENT_COST_WEIGHT => "按重量"
    ];

    const shipmentUnitMap = [
        self::SHIPMENT_COST_NUMERIC => "件",
        self::SHIPMENT_COST_WEIGHT => "KG"
    ];

    public function rules()
    {
        return $this->hasMany(ShipmentRule::class,"shipment_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class,"shipment_id");
    }



}
