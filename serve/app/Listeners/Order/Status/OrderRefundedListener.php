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

class OrderRefundedListener
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
        if ($event->status = Order::REFUND_STATUS_REFUNDED) {
            $order = $event->order;
            if (in_array($order['status'], [
                Order::ORDER_STATUS_PENDING, Order::ORDER_STATUS_CANCEL, Order::ORDER_STATUS_CLOSED,
            ])) throw (new HttpResponseException(response()->json(['code' => 422, "message" => "该订单状态下无法退单", "body" => null,], 422)));
            DB::beginTransaction();
            try {
                if($refund = $order->refunds()->where('status',OrderRefund::REFUND_STATUS_REFUNDING)->first()){
                   $refund->update([
                       "status"=>OrderRefund::REFUND_STATUS_REFUNDED,
                       "reason"=>"{$refund['reason']}，【商家理由】：".($event->reason??'空'),
                   ]);
                }else{
                    $order->refunds()->create([
                        'status'=>OrderRefund::REFUND_STATUS_REFUNDED,
                        'reason'=>"商家主动退单，【商家理由】：".($event->reason??'空')
                    ]);
                }
                $order->update([
                    'status' => Order::ORDER_STATUS_CLOSED,
                    "refund_status"=>Order::REFUND_STATUS_REFUNDED,
                    "closed_reason"=>"退单",
                    "closed_at" => now()
                ]);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "系统错误", "body" => null,], 422)));
            }
            event(new SmsSendEvent($event->shop, $event->customer['mobile'], "order_refund", $event->data));

        }

    }
}
