<?php

namespace App\Listeners\Order\RefundRecord\Confirm;

use App\Events\Order\OrderRefundRecordConfirmEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Models\OrderRefundRecord;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderRefundRecordConfirmation
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
     * @param  OrderRefundRecordConfirmEvent  $event
     * @return void
     */
    public function handle(OrderRefundRecordConfirmEvent $event)
    {
        $order = $event->record->order;
        $shop = $order->shop;
        $user = $shop->user;
        $data = [
            'order_no'=>$order['no'],
            'amount'=>$event->record['amount']
        ];
        $event->record->update([
            "status"=>OrderRefundRecord::RECORD_STATUS_SUCCESS
        ]);
        event(new SmsSendEvent($shop,$user['mobile'],"order_payback",$data));
    }
}
