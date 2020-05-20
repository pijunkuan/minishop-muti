<?php

namespace App\Listeners\User\Wallet;

use App\Events\User\Wallet\WalletLogEvent;
use App\Models\UserWalletClearList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WalletLogConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param WalletLogEvent $event
     * @return void
     */
    public function handle(WalletLogEvent $event)
    {
        $wallet = $event->wallet;
        DB::beginTransaction();
        try {

            $wallet->log_lists()->create([
                "type" => $event->type,
                "amount"=>$event->amount,
                "last_balance"=>$wallet['balance'],
                "next_balance"=>$wallet['balance'] + $event->amount,
                "content"=>$event->content
            ]);
            $wallet['balance'] += $event->amount;
            $wallet->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => "系统错误",
                "body" => null,
            ], 422)));
        }
    }
}
