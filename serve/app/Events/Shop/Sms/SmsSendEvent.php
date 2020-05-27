<?php

namespace App\Events\Shop\Sms;

use App\Models\Shop;
use App\Models\SysSmsTemplate;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Overtrue\EasySms\EasySms;

class SmsSendEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $shop,$mobile,$sms_template,$data,$easySms,$sign;
    /**
     * Create a new event instance.
     *
     * @param Shop $shop
     * @param $mobile
     * @param $template_code
     * @param $data
     */
    public function __construct(Shop $shop, $mobile, $template_code, $data)
    {
        $this->easySms = new EasySms(config('easysms'));
        $sign = $shop->signs()->where('active',true)->first();
        $this->sign = $sign?"【{$sign['sign_name']}】":"【".env('DEFAULT_SIGN')."】";
        $this->shop = $shop;
        $this->mobile = $mobile;
        $this->sms_template = $shop->sms_templates()->where('template_code',$template_code)->first();
        $this->data = $data;
        if(!$this->sms_template) return false;
        if($shop->sms_account['amount'] < 0) return false;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
