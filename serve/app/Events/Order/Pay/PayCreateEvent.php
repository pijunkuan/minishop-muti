<?php

namespace App\Events\Order\Pay;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PayCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order, $payment;

    /**
     * Create a new event instance.
     *
     * @param Order $order
     * @param $payment
     */
    public function __construct(Order $order, $payment)
    {
        $this->order = $order;
        $this->payment = $payment;
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
