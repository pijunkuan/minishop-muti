<?php

namespace App\Listeners\Shop\Block;

use App\Events\Shop\Block\BlockSuccessEvent;
use App\Models\ShopOrder;
use App\Models\SysTemplate;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TemplateConfirmation
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
     * @param BlockSuccessEvent $event
     * @return void
     */
    public function handle(BlockSuccessEvent $event)
    {
        $shop = $event->shop;
        if ($event->item_type == ShopOrder::ITEM_TYPE_TEMPLATE) {
            $template = SysTemplate::find($event->sys_block_id);
            if ($template) {
                $exp_at = now()->addMonths($event->time)->addDay();
                $shop_template = $shop->templates()->where('sys_template_id', $template['id'])->first();
                if ($shop_template) {
                    if ($shop_template['exp_at'] > now()) {
                        $exp_at = Carbon::make($shop_template['exp_at'])->addMonths($event->time)->addDay();
                    }
                    $shop_template->update([
                        'exp_at' => $exp_at
                    ]);
                }else{
                    $shop_template = $shop->templates()->create([
                        "sys_template_id"=>$template['id'],
                        "exp_at"=>$exp_at
                    ]);
                    if($shop->templates()->count() == 1){
                        $shop_template->update(['active'=>true]);
                    }
                    $shop_template = $shop_template->refresh();
                    $default_setting_file = "{$template['template_file']}template_setting.json";
                    if(Storage::exists($default_setting_file)){
                        $default_setting = json_encode(Storage::get($default_setting_file),true);
                    }else{
                        $default_setting = null;
                    }
                    $shop_template->setting()->create([
                        'setting'=>$default_setting
                    ]);
                }
            }
        }
    }
}
