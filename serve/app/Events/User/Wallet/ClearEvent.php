<?php

namespace App\Events\User\Wallet;

use App\Models\UserWalletClearList;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClearEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $clearList;
    /**
     * Create a new event instance.
     *
     * @param UserWalletClearList $clearList
     */
    public function __construct(UserWalletClearList $clearList)
    {
        $this->clearList = $clearList;
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
