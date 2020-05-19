<?php

namespace App\Listeners\Sms;

use App\Events\Sms\SmsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class VerificationConfirmation
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
     * @param SmsEvent $event
     * @return void
     * @throws \Overtrue\EasySms\Exceptions\InvalidArgumentException
     * @throws \Overtrue\EasySms\Exceptions\NoGatewayAvailableException
     */
    public function handle(SmsEvent $event)
    {
        $code = random_int(1000,9999);
        if ($event->type == "verification") {
            try {
                $event->easySms->send($event->mobile, [
                    "content" => "{$event->sign}您好，您的验证码是{$code}，请尽快验证，如非本人操作请忽略。",
                    ]);
            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('yunpian')->getMessage();
                throw (new HttpResponseException(response()->json([
                    'code' => 422,
                    "message" => $message,
                    "body" => null,
                ], 422)));
            }
        }
        Cache::put("SMS_CODE{$event->mobile}",$code,300);
    }
}
