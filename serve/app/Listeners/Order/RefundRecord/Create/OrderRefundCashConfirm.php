<?php

namespace App\Listeners\Order\RefundRecord\Create;

use App\Events\Order\OrderRefundRecordCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;

class OrderRefundCashConfirm
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
     * @param  OrderRefundRecordCreateEvent  $event
     * @return void
     */
    public function handle(OrderRefundRecordCreateEvent $event)
    {
        if($event->payment['payment_method'] == "cash"){
            throw (new HttpResponseException(response()->json([
                'code'=>422,
                "message"=>"货到付款不支持退款",
                "data"=>null,
            ],422)));
        }
    }
}
