<?php

namespace App\Listeners\Shop\Pay;

use App\Events\Shop\Pay\PaySuccessEvent;
use App\Models\ShopOrder;
use App\Models\ShopOrderPayment;
use App\Models\SysLevelVariant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaySuccessConfirmation
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
     * @param PaySuccessEvent $event
     * @return void
     */
    public function handle(PaySuccessEvent $event)
    {
        DB::beginTransaction();
        try {
            $now = now();
            $payment = $event->payment;
            $payment->update([
                "pay_no" => $event->no,
                "pay_at" => $now,
                "status" => ShopOrderPayment::PAYMENT_STATUS_PAID
            ]);
            $order = $payment->shopOrder;
            $order->update([
                'status' => ShopOrder::ORDER_STATUS_PAID
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "msg" => $exception->getMessage(),
                "data" => null,
            ], 422)));
        }

    }
}
