<?php

namespace App\Listeners\Order\Status;

use App\Events\Order\Status\OrderStatusEvent;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderCloseListener
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
     * @param  OrderStatusEvent  $event
     * @return void
     */
    public function handle(OrderStatusEvent $event)
    {
        if ($event->status == Order::ORDER_STATUS_CLOSED) {

        }
    }
}
