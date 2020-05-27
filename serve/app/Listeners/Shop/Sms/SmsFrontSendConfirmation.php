<?php

namespace App\Listeners\Shop\Sms;

use App\Events\Shop\Sms\SmsAmountEvent;
use App\Events\Shop\Sms\SmsSendEvent;
use App\Models\ShopSmsLog;
use App\Services\YuanPian\SmsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Overtrue\EasySms\Exceptions\InvalidArgumentException;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class SmsFrontSendConfirmation
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
     * @param SmsSendEvent $event
     * @return bool
     * @throws InvalidArgumentException
     */
    public function handle(SmsSendEvent $event)
    {
        if (in_array($event->sms_template['template_type'], ['front_customer', 'front_order'])) {
            $content =$event->sign . SmsService::template($event->sms_template['template_content'], $event->data);
            try {
                $event->easySms->send($event->mobile, [
                    "content" => $content,
                ]);
            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('yunpian')->getMessage();
                Log::error($message);
                return false;
            }
            event(new SmsAmountEvent($event->shop['id'],ShopSmsLog::SMS_TYPE_OUT,$content,$event->mobile));
        }
    }
}
