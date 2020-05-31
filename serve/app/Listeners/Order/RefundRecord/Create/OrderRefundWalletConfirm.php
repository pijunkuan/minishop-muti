<?php

namespace App\Listeners\Order\RefundRecord\Create;

use App\Events\Customer\Wallet\WalletAmountEvent;
use App\Events\Order\OrderRefundRecordConfirmEvent;
use App\Events\Order\OrderRefundRecordCreateEvent;
use App\Models\OrderRefundRecord;
use App\Models\Wallet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderRefundWalletConfirm
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
     * @param OrderRefundRecordCreateEvent $event
     * @return void
     */
    public function handle(OrderRefundRecordCreateEvent $event)
    {
        if ($event->payment['payment_method'] == "wallet") {
            $customer = $event->order->customer;
            $record = $event->order->refund_records()->create($event->data);
            $record->refresh();
            event(new OrderRefundRecordConfirmEvent($record));
            event(new WalletAmountEvent($customer, $record['amount'], Wallet::WALLET_IN,"{$event->order['no']}退款到账"));
        }
    }
}
