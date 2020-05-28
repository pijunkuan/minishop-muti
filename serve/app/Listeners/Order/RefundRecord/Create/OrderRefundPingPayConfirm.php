<?php

namespace App\Listeners\Order\RefundRecord\Create;

use App\Events\Order\OrderRefundRecordCreateEvent;
use App\Events\User\Wallet\WalletLogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderRefundPingPayConfirm
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
     * @param OrderRefundRecordCreateEvent $event
     * @return void
     */
    public function handle(OrderRefundRecordCreateEvent $event)
    {
        if (in_array($event->payment['payment_method'], ['alipay', 'wxpay'])) {
            $shop = $event->order->shop;
            $user = $shop->user;
            $wallet = $user->wallet;
            if (!$wallet) throw (new HttpResponseException(response()->json(['code' => 422, "message" => "用户尚未开启钱包", "data" => null,], 422)));
            if ($wallet['balance'] < $event->data['amount']) throw (new HttpResponseException(response()->json(['code' => 422, "message" => "钱包余额不足", "data" => null,], 422)));
            DB::beginTransaction();
            try {
                $record = $event->order->refund_records()->create($event->data);
                $record->refresh();
                $wallet->refund_lists()->create([
                    "pay_no"=>$event->payment['pay_no'],
                    "record_no"=>$record['no'],
                    "order_no"=>$event->order['no'],
                    "amount"=>$record['amount'],
                    "way"=>$event->payment['payment_method'],
                    "fee"=>0,
                    "content"=>$record['content']
                ]);
                event(new WalletLogEvent($wallet,$record['amount'],'out',"订单{$event->order['no']}退款,金额：{$record['amount']}"));
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
            }
        }

    }
}
