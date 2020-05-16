<?php

namespace App\Events\Order\Pay;

use App\Models\OrderPayment;
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

    public $payment, $pay_no;

    /**
     * Create a new event instance.
     *
     * @param OrderPayment $payment
     * @param $pay_no
     */
    public function __construct(OrderPayment $payment, $pay_no)
    {
        $this->payment = $payment;
        $this->pay_no = $pay_no;
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
