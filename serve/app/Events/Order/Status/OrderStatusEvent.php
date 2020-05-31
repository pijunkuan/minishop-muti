<?php

namespace App\Events\Order\Status;

use App\Models\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order,$status,$reason,$shop,$data,$customer;
    /**
     * Create a new event instance.
     *
     * @param Order $order
     * @param $status
     * @param null $reason
     */
    public function __construct(Order $order,$status,$reason = null)
    {
        $this->order = $order;
        $this->status = $status;
        $this->reason = $reason;
        $this->shop = $order['shop'];
        $this->customer = $order['customer'];
        $this->data = ["order_no" => $order['no'], "amount" => $order['amount'], "order_status" => Order::orderStatusMap[$order['status']]];
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
