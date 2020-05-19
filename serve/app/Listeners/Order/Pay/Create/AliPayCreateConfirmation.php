<?php

namespace App\Listeners\Order\Pay\Create;

use App\Events\Order\Pay\PayCreateEvent;
use App\Models\OrderPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class AliPayCreateConfirmation
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
     * @param  PayCreateEvent  $event
     * @return void
     */
    public function handle(PayCreateEvent $event)
    {
        $order = $event->order;
        $payment = $event->payment;
        if ($payment == "alipay") {
            DB::beginTransaction();
            try {
                $order->payments()->update(['status' => OrderPayment::PAYMENT_STATUS_CLOSED]);
                $order->payments()->create([
                    "pay_amount" => $order->amount,
                    "payment_method" => $payment,
                    "status" => OrderPayment::PAYMENT_STATUS_PENDING,
                ]);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                throw (new HttpResponseException(response()->json([
                    'code' => 422,
                    "message" => "支付宝 支付创建失败",
                    "body" => null,
                ], 422)));
            }
        }
    }
}
