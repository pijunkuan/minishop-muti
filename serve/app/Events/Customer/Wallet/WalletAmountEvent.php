<?php

namespace App\Events\Customer\Wallet;

use App\Models\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WalletAmountEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $customer,$amount,$type,$content;

    /**
     * Create a new event instance.
     * @param Customer $customer
     * @param $amount
     * @param string $type
     * @param null $content
     */
    public function __construct(Customer $customer, $amount, $type = "in", $content = null)
    {
        $this->customer = $customer;
        $this->amount = $amount;
        $this->type = $type;
        $this->content = $content;
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
