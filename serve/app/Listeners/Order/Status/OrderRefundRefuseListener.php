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

class OrderRefundRefuseListener
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
        if ($event->status == "refund_refuse") {
            $order = $event->order;
            if ($order['refund_status'] != Order::REFUND_STATUS_REFUNDING)
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "该订单没有申请退单", "body" => null,], 422)));
            DB::beginTransaction();
            try {
                if ($refund = $order->refunds()->where('status', OrderRefund::REFUND_STATUS_REFUNDING)->first()) {
                    $refund->update([
                        "status" => OrderRefund::REFUND_STATUS_REFUSE,
                        "reason" => "{$refund['reason']}【商家拒绝理由】：" . ($event->reason ?? "空")
                    ]);
                }
                $order->update([
                    "refund_status" => null,
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
