<?php

namespace App\Listeners\Order\Status;

use App\Events\Order\Status\OrderStatusEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\ShopOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderCancelListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param OrderStatusEvent $event
     * @return void
     */
    public function handle(OrderStatusEvent $event)
    {
        if ($event->status == Order::ORDER_STATUS_PENDING) {
            $order = $event->order;
            if ($order['status'] !== Order::ORDER_STATUS_PENDING) throw (new HttpResponseException(response()->json(['code' => 422, "message" => "该订单状态下无法取消订单", "data" => null,], 422)));
            DB::beginTransaction();
            try {
                $order->update(['status' => Order::ORDER_STATUS_CANCEL, "closed_reason" => $event->reason, "closed_at" => now(),]);
                $order->refresh();
                foreach ($order['items'] as $item) if ($variant = ProductVariant::find($item['variant_id'])) $variant->addStock($item['quantity']);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                throw (new HttpResponseException(response()->json(['code' => 422, "message" => "系统错误", "body" => null,], 422)));
            }
            event(new SmsSendEvent($event->shop['id'], $event->customer['mobile'], "order_cancel", $event->data));
            event(new SmsSendEvent($event->shop['id'], $event->shop['user']['mobile'], "admin_order_cancel", $event->data));
        }
    }
}
