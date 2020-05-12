<?php

namespace App\Listeners\Shop\Pay;

use App\Events\Shop\Pay\PaySuccessEvent;
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
     * @param  PaySuccessEvent  $event
     * @return void
     */
    public function handle(PaySuccessEvent $event)
    {
        DB::beginTransaction();
        try{
            $payment = $event->payment;
            $order = $payment->shopOrder;
            $shop = $order->shop;
            $items = $order->items;
            foreach($items as $item){
                switch ($item['type']){

                }
            }

            DB::commit();
        }catch (\Exception $exception){
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
