<?php

namespace App\Listeners\User\Wallet;

use App\Events\User\Wallet\OrderEvent;
use App\Models\OrderPayment;
use App\Models\UserWalletIncome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaySuccessConfirmation
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
     * @param  OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
        DB::beginTransaction();
        try {
            $payment = $event->payment;
            $shop = $payment->customer->shop;
            $user = $shop->user;
            $level = $shop->level->level;
            $way_value = UserWalletIncome::wayMap[$payment['payment_method']];
            $fee = round($payment['pay_amount'] * $level['fee_rate'] * 0.01, 2);
            $data = [
                "pay_no" => $payment['pay_no'],
                "no" => $payment['order']['no'],
                "amount" => $payment['pay_amount'],
                "fee" => $fee,
                "fee_rate" => $level['fee_rate'],
                "way" => $payment['payment_method'],
                "content" => "订单{$payment['order']['no']}通过({$way_value})进行支付{$payment['pay_amount']}(手续费：{$fee})"
            ];
            $wallet = $user->wallet;
            $income = $wallet->incomes()->create($data);
            $income->refresh();
            if ($clear = $wallet->clear_lists()->whereDate('user_wallet_clear_lists.created_at', now()->toDateString())->first()) {
                $clear->amount += $payment['pay_amount'];
                $clear->fee += $fee;
                $clear->order_count++;
                $clear->save();
            } else {
                $wallet->clear_lists()->create([
                    "amount" => $payment['pay_amount'],
                    "fee" => $fee,
                    "order_count" => 1,
                    "unlocked_at" => now()->addDays($level['unlock_days'])->endOfDay(),
                ]);
            }
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
