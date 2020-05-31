<?php

namespace App\Listeners\Order\Status;

use App\Events\Order\Status\OrderStatusEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderSuccessListener
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
        if($event->status == Order::ORDER_STATUS_SUCCESS){
            $order = $event->order;
            if (in_array($order['status'], [
                Order::ORDER_STATUS_PENDING, Order::ORDER_STATUS_CANCEL, Order::ORDER_STATUS_CLOSED, Order::ORDER_STATUS_SUCCESS,
            ])) {
                throw (new HttpResponseException(response()->json([
                    'code' => 422, "message" => "该订单状态下无法完成订单", "body" => null,
                ], 422)));
            }
            DB::beginTransaction();
            try {
                $order->update([
                    "status"=>Order::ORDER_STATUS_SUCCESS,
                    "success_at"=>now(),
                ]);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "系统错误", "body" => null,], 422)));
            }
            event(new SmsSendEvent($event->shop, $event->shop['user']['mobile'], "admin_order_success", $event->data));
        }
    }
}
