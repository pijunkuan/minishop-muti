<?php

namespace App\Listeners\Shop\Sms;

use App\Events\Shop\Sms\SmsAmountEvent;
use App\Models\ShopSmsLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SmsAmountConfirmation implements ShouldQueue
{
    public $connection = "redis";

    public $queue = "sms_account";
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
     * @param SmsAmountEvent $event
     * @return void
     */
    public function handle(SmsAmountEvent $event)
    {
        DB::beginTransaction();
        try {
            $shop_sms_account = DB::table('shop_sms_accounts')->where('id', $event->shop_id)->sharedLock()->first();
            $time = now();
            if ($shop_sms_account) {
                $last_amount = $shop_sms_account->amount;
                if ($event->type == ShopSmsLog::SMS_TYPE_OUT) {
                    $amount = ceil(mb_strlen($event->content) / 67);
                    if ($amount == 0) $amount = 1;
                    $next_amount = $last_amount - $amount;
                    DB::table('shop_sms_logs')->insert([
                        'shop_id' => $event->shop_id,
                        "mobile" => $event->mobile,
                        "type"=>ShopSmsLog::SMS_TYPE_OUT,
                        "content" => "发送内容：" . $event->content,
                        "amount" => 0 - $amount,
                        "last_amount" => $last_amount,
                        "next_amount" => $next_amount,
                        "created_at"=>$time,
                        "updated_at"=>$time,
                    ]);
                    DB::table('shop_sms_accounts')->where('id', $event->shop_id)->decrement('amount', abs($amount));
                }
                if ($event->type == ShopSmsLog::SMS_TYPE_IN) {
                    $amount = abs($event->amount);
                    if ($amount) {
                        $next_amount = $last_amount + $amount;
                        DB::table('shop_sms_logs')->insert([
                            'shop_id' => $event->shop_id,
                            "mobile" => null,
                            "type"=>ShopSmsLog::SMS_TYPE_IN,
                            "content" => $event->content?:"商城短信充值{$amount}条",
                            "amount" => $amount,
                            "last_amount" => $last_amount,
                            "next_amount" => $next_amount,
                            "created_at"=>$time,
                            "updated_at"=>$time,
                        ]);
                        DB::table('shop_sms_accounts')->where('id', $event->shop_id)->increment('amount', abs($amount));
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
        }
    }
}
