<?php

namespace App\Listeners\Shop\Block;

use App\Events\Shop\Block\BlockSuccessEvent;
use App\Events\Shop\Sms\SmsAmountEvent;
use App\Models\ShopOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SmsConfirmation
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
     * @param  BlockSuccessEvent  $event
     * @return void
     */
    public function handle(BlockSuccessEvent $event)
    {
        $shop = $event->shop;
        if($event->item_type == ShopOrder::ITEM_TYPE_SMS){
            $amount = $event->time;
            event(new SmsAmountEvent($shop['id'],"in",null,null,$amount));
        }
    }
}
