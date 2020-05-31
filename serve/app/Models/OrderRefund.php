<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRefund extends Model
{
    public $table = "app_order_refunds";
    protected $guarded = [];

    const REFUND_STATUS_REFUNDING = "refunding";
    const REFUND_STATUS_REFUNDED = "refunded";
    const REFUND_STATUS_CANCEL = "cancel";
    const REFUND_STATUS_REFUSE = "refuse";

    const refundStatusMap = [
      self::REFUND_STATUS_REFUNDING => "退单申请",
      self::REFUND_STATUS_REFUNDED => "退单完成",
      self::REFUND_STATUS_CANCEL => "退单取消",
      self::REFUND_STATUS_REFUSE => "退单拒绝",
    ];


    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
}
