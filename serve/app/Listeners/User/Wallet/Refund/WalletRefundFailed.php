<?php

namespace App\Listeners\User\Wallet\Refund;

use App\Events\User\Wallet\Refund\WalletRefundConfirmEvent;
use App\Events\User\Wallet\WalletLogEvent;
use App\Models\OrderRefundRecord;
use App\Models\UserWalletRefundList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WalletRefundFailed
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
     * @param  WalletRefundConfirmEvent  $event
     * @return void
     */
    public function handle(WalletRefundConfirmEvent $event)
    {
        if($event->status == "failed"){
            DB::beginTransaction();
            try{
                $event->refund_list->update([
                    "status"=>UserWalletRefundList::RECORD_STATUS_FAILED,
                    "content"=>$event->refund_list['content']."(失败原因：{$event->content})"
                ]);
                $event->refund_list->refund_record->update([
                    "status"=>OrderRefundRecord::RECORD_STATUS_FAILED
                ]);
                event(new WalletLogEvent(
                    $event->refund_list->wallet,
                    $event->refund_list['amount'],
                    "in",
                    "订单{$event->refund_list['order_no']}退款失败，增加金额：{$event->refund_list['amount']}"
                ));
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
