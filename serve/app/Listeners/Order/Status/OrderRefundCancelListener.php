<?php

namespace App\Listeners\Order\Status;

use App\Events\Order\Status\OrderStatusEvent;
use App\Models\Order;
use App\Models\OrderRefund;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderRefundCancelListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderStatusEvent $event
     * @return void
     */
    public function handle(OrderStatusEvent $event)
    {
        if ($event->status == "refund_cancel") {
            $order = $event->order;
            if ($order['refund_status'] != Order::REFUND_STATUS_REFUNDING) throw (new HttpResponseException(response()->json(['code' => 422, "message" => "该订单没有取消退款", "body" => null,], 422)));
            DB::beginTransaction();
            try {
                if($refund = $order->refunds()->where('status',OrderRefund::REFUND_STATUS_REFUNDING)->first()){
                    $refund->update(["status"=>OrderRefund::REFUND_STATUS_CANCEL,"reason"=>"{$refund['reason']}【客户主动取消退单】"]);
                }
                $order->update([
                    "refund_status"=> null
                ]);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "系统错误", "body" => null,], 422)));
            }
        }
    }
}
