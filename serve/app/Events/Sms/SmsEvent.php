<?php

namespace App\Events\Sms;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Overtrue\EasySms\EasySms;

class SmsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $type,$param,$sign,$mobile,$easySms;

    /**
     * Create a new event instance.
     *
     * @param $type
     * @param $param
     * @param $mobile
     * @param string $sign
     */
    public function __construct($type,$mobile, $param = null, $sign = null)
    {
        $this->easySms = new EasySms(config('easysms'));
        $this->type = $type;
        $this->param = $param;
        $this->mobile = $mobile;
        $this->sign = $sign ? "【{$sign}】":"【min-eshop】";
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
