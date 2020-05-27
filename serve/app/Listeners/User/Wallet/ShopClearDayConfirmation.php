<?php

namespace App\Listeners\User\Wallet;

use App\Events\User\Wallet\ShopClearEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopClearDayConfirmation
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
     * @param ShopClearEvent $event
     * @return void
     */
    public function handle(ShopClearEvent $event)
    {
        $shop = $event->shop;
        $wallet = $shop->user->wallet;
        if ($wallet) {
            $level = $shop['level']['level'];
            $incomes = $shop->incomes()->whereNull('clear_no')->where('created_at', '<', now()->startOfDay());
            $amount = $incomes->sum('amount');
            $fee = $incomes->sum('fee');
            $count = $incomes->count();
            if ($amount) {
                DB::beginTransaction();
                try {
                    $clear = $wallet->clear_lists()->create([
                        "amount" => $amount,
                        "fee" => $fee,
                        "unlock_days" => $level['unlock_days'],
                        "order_count" => $count,
                        "unlocked_at" => now()->addDays($level['unlock_days'])->endOfDay(),
                    ]);
                    $clear->refresh();
                    $incomes->update(['clear_no' => $clear['no']]);
                    DB::commit();
                } catch (\Exception $exception) {
                    DB::rollBack();
                    Log::error($exception->getMessage());
                }
            }
        }


    }
}
