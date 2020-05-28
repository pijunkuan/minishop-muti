<?php

namespace App\Events\User\Wallet\Refund;

use App\Models\UserWalletRefundList;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WalletRefundConfirmEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $refund_list, $status, $content;

    /**
     * Create a new event instance.
     *
     * @param UserWalletRefundList $refund_list
     * @param string $status
     * @param null $content
     */
    public function __construct(UserWalletRefundList $refund_list, $status = "success", $content = null)
    {
        $this->refund_list = $refund_list;
        $this->content = $content;
        $this->status = $status;
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
