<?php

namespace App\Listeners\User\Wallet\Refund;

use App\Events\Order\OrderRefundRecordConfirmEvent;
use App\Events\User\Wallet\Refund\WalletRefundConfirmEvent;
use App\Models\UserWalletRefundList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WalletRefundSuccess
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
     * @param WalletRefundConfirmEvent $event
     * @return void
     */
    public function handle(WalletRefundConfirmEvent $event)
    {
        if ($event->status == "success") {
            $event->refund_list->update(['status'=>UserWalletRefundList::RECORD_STATUS_SUCCESS]);
            event(new OrderRefundRecordConfirmEvent($event->refund_list['refund_record']));
        }

    }
}
