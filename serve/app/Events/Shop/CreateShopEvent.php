<?php

namespace App\Events\Shop;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateShopEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user ,$order_no;
    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param null $order_no
     */
    public function __construct(User $user , $order_no = null)
    {
        $this->user = $user;
        $this->order_no = $order_no;
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
