<?php

namespace App\Events\Shop\Block;

use App\Models\Shop;
use App\Models\ShopOrderItem;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BlockSuccessEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $item_type, $sys_block_id, $time, $shop;

    /**
     * Create a new event instance.
     *
     * @param ShopOrderItem $item
     * @param Shop $shop
     */
    public function __construct(Shop $shop, $item_type, $sys_block_id, $time)
    {
        $this->shop = $shop;
        $this->item_type = $item_type;
        $this->time = $time;
        $this->sys_block_id = $sys_block_id;
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
