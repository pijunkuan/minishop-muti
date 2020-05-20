<?php

namespace App\Listeners\User\Wallet;

use App\Events\User\Wallet\ClearEvent;
use App\Events\User\Wallet\WalletLogEvent;
use App\Models\UserWalletClearList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClearDayConfirmation
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
     * @param  ClearEvent  $event
     * @return void
     */
    public function handle(ClearEvent $event)
    {
        $clearList = $event->clearList;
        $wallet = $clearList->wallet;
        if($clearList['status'] == UserWalletClearList::CLEAR_STATUS_PENDING){
            if($clearList['unlocked_at'] < now()->subDay()->endOfDay()){
                DB::beginTransaction();
                try{
                    $clearList->status = UserWalletClearList::CLEAR_STATUS_SUCCESS;
                    $clearList->save();
                    $amount = $clearList['amount'] - $clearList['fee'];
                    event(new WalletLogEvent($wallet,$amount,"in","资金解冻（{$amount}）"));
                    DB::commit();
                }catch(\Exception $exception){
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

    }
}
