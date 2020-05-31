<?php

namespace App\Listeners\Order\Status;

use App\Events\Order\Status\OrderStatusEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Models\Order;
use App\Models\OrderRefund;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderRefundingListener
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
     * @param  OrderStatusEvent  $event
     * @return void
     */
    public function handle(OrderStatusEvent $event)
    {
        if($event->status = Order::REFUND_STATUS_REFUNDING){
            $order = $event->order;
            if (in_array($order['status'], [Order::ORDER_STATUS_PENDING, Order::ORDER_STATUS_CANCEL, Order::ORDER_STATUS_CLOSED,]) || !is_null($order['refund_status'])) {
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "该订单状态下无法申请退款", "body" => $order['refund_status'],], 422)));
            }
            DB::beginTransaction();
            try {
                $order->update(['refund_status'=>Order::REFUND_STATUS_REFUNDING]);
                $order->refresh();
                $order->refunds()->create(["reason"=>$event->reason, "status"=>OrderRefund::REFUND_STATUS_REFUNDING]);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "系统错误", "body" => null,], 422)));
            }
            event(new SmsSendEvent($event->shop['id'], $event->customer['mobile'], "admin_order_refunding", $event->data));
        }
    }
}
