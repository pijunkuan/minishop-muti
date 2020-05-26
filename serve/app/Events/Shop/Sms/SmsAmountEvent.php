<?php

namespace App\Events\Shop\Sms;

use App\Models\Shop;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SmsAmountEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $shop_id,$type,$content,$mobile,$amount;

    /**
     * Create a new event instance.
     * @param $shop_id
     * @param string $type
     * @param null $content
     * @param null $mobile
     * @param null $amount
     */
    public function __construct($shop_id,$type = "in", $content = null, $mobile = null, $amount = null)
    {
        $this->shop_id = $shop_id;
        $this->content = $content;
        $this->type = $type;
        $this->mobile = $mobile;
        $this->amount = $amount;
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
