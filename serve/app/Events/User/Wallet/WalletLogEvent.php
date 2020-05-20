<?php

namespace App\Events\User\Wallet;

use App\Models\UserWallet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WalletLogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $wallet, $type, $amount,$content;

    /**
     * Create a new event instance.
     * @param UserWallet $wallet
     * @param $amount
     * @param $type
     * @param null $content
     */
    public function __construct(UserWallet $wallet, $amount, $type,$content = null)
    {
        $amount = abs($amount * 1.00);
        $this->wallet = $wallet;
        $this->type = $type;
        $this->content = $content;
        switch ($type) {
            case "in":
                $this->amount = $amount;
                break;
            case "out":
                $this->amount = 0 - $amount;
                break;
            default:
                Log::error('钱包记录 类型TYPE错误');
                throw (new HttpResponseException(response()->json([
                    'code' => 422,
                    "message" => "类型错误",
                    "body" => null,
                ], 422)));
                break;
        }
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
