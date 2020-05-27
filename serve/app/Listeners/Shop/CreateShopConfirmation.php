<?php

namespace App\Listeners\Shop;

use App\Events\Shop\CreateShopEvent;
use App\Models\ShopOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateShopConfirmation
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
     * @param  CreateShopEvent  $event
     * @return void
     */
    public function handle(CreateShopEvent $event)
    {
        $user = $event->user;
        $shop =$user->shops()->create();
        $shop->refresh();
        if($event->order_no){
            $order = ShopOrder::where('no',$event->order_no)->first();
            $order->update([
                'shop_id'=>$shop['id'],
                "shop_name"=>$shop['shop_name']
            ]);
            $shop->sms_account()->create();

        }
    }
}
