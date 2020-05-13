<?php

namespace App\Listeners\Shop\Block;

use App\Events\Shop\Block\BlockSuccessEvent;
use App\Models\ShopOrder;
use App\Models\SysLevel;
use App\Models\SysLevelVariant;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LevelConfirmation
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
        if($event->item_type == ShopOrder::ITEM_TYPE_LEVEL){
            $level = SysLevel::find($event->sys_block_id);
            if($level){
                $exp_at = now()->addMonths($event->time)->addDay();
                $shop_level = $shop->level;
                if($shop_level){
                    switch ($level['id']){
                        case 1:
                            if($shop_level['sys_level_id'] == 1){
                                $shop_level->update([
                                   'exp_at'=>$exp_at
                                ]);
                            }
                            break;
                        case 2:
                            switch ($shop_level['sys_level_id']){
                                case 1:
                                    $shop_level->update([
                                        'sys_level_id'=>2,
                                        'exp_at'=>$exp_at
                                    ]);
                                    break;
                                case 2:
                                    if($shop_level['exp_at'] < now()){
                                        $shop_level->update([
                                            'exp_at'=>$exp_at
                                        ]);
                                    }else{
                                        $exp_at = $shop_level['exp_at']->addMonths($event->time)->addDay();
                                        $shop_level->update([
                                           'exp_at'=> $exp_at
                                        ]);
                                    }
                                    break;
                            }
                            break;
                    }
                }else{
                    $shop->level()->create([
                        'sys_level_id'=>$level['id'],
                        'exp_at'=>$exp_at
                    ]);
                }
            }
        }
    }
}
