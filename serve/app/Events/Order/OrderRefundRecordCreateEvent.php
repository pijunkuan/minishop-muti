<?php

namespace App\Events\Order;

use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\OrderRefundRecord;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderRefundRecordCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $payment, $order, $data;

    /**
     * Create a new event instance.
     * @param Order $order
     * @param $data
     */
    public function __construct(Order $order, $data)
    {
        $this->order = $order;
        $this->payment = $order->payments()->where('status', OrderPayment::PAYMENT_STATUS_SUCCESS)->first();
        $this->data = $data;
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
