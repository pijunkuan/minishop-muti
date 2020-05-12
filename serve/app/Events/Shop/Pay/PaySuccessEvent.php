<?php

namespace App\Events\Shop\Pay;

use App\Models\ShopOrderPayment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaySuccessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $payment,$no;

    /**
     * Create a new event instance.
     *
     * @param ShopOrderPayment $payment
     * @param $no
     */
    public function __construct(ShopOrderPayment $payment ,$no)
    {
        $this->payment = $payment;
        $this->no = $no;
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
