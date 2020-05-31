<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\Sms\SmsEvent'=>[
            'App\Listeners\Sms\VerificationConfirmation'
        ],

        'App\Events\Shop\Sms\SmsAmountEvent'=>[
            'App\Listeners\Shop\Sms\SmsAmountConfirmation'
        ],

        'App\Events\Shop\Sms\SmsSendEvent'=>[
            'App\Listeners\Shop\Sms\SmsFrontSendConfirmation',
            'App\Listeners\Shop\Sms\SmsAdminSendConfirmation'
        ],

        'App\Events\User\Wallet\OrderEvent'=>[
            'App\Listeners\User\Wallet\PaySuccessConfirmation'
        ],
        'App\Events\User\Wallet\ClearEvent'=>[
            'App\Listeners\User\Wallet\ClearDayConfirmation'
        ],

        'App\Events\User\Wallet\ShopClearEvent'=>[
            'App\Listeners\User\Wallet\ShopClearDayConfirmation'
        ],

        'App\Events\User\Wallet\WalletLogEvent'=>[
            'App\Listeners\User\Wallet\WalletLogConfirmation'
        ],

        'App\Events\User\Wallet\Refund\WalletRefundConfirmEvent'=>[
            'App\Listeners\User\Wallet\Refund\WalletRefundSuccess',
            'App\Listeners\User\Wallet\Refund\WalletRefundFailed',
        ],
        'App\Events\Order\Status\OrderStatusEvent'=>[
            "App\Listeners\Order\Status\OrderCancelListener",
            "App\Listeners\Order\Status\OrderCloseListener",
            "App\Listeners\Order\Status\OrderRefundingListener",
            "App\Listeners\Order\Status\OrderRefundRefuseListener",
            "App\Listeners\Order\Status\OrderRefundCancelListener",
            "App\Listeners\Order\Status\OrderRefundedListener",
            "App\Listeners\Order\Status\OrderSuccessListener",
        ],

        'App\Events\Order\OrderRefundRecordCreateEvent'=>[
            'App\Listeners\Order\RefundRecord\Create\OrderRefundWalletConfirm',
            'App\Listeners\Order\RefundRecord\Create\OrderRefundCashConfirm',
            'App\Listeners\Order\RefundRecord\Create\OrderRefundPingPayConfirm',
        ],
        'App\Events\Order\OrderRefundRecordConfirmEvent'=>[
            'App\Listeners\Order\RefundRecord\Confirm\OrderRefundRecordConfirmation'
        ],

        'App\Events\Order\Pay\PayCreateEvent'=>[
            'App\Listeners\Order\Pay\Create\WalletCreateConfirmation',
            'App\Listeners\Order\Pay\Create\CashCreateConfirmation',
            'App\Listeners\Order\Pay\Create\AliPayCreateConfirmation',
            'App\Listeners\Order\Pay\Create\WxPayCreateConfirmation',
        ],

        'App\Events\Order\Pay\PaySuccessEvent'=>[
            'App\Listeners\Order\Pay\Success\PaySuccessConfirmation'
        ],

        'App\Events\Shop\Pay\PaySuccessEvent'=>[
            'App\Listeners\Shop\Pay\PaySuccessConfirmation'
        ],
        'App\Events\Shop\CreateShopEvent'=>[
            'App\Listeners\Shop\CreateShopConfirmation'
        ],
        'App\Events\Shop\Block\BlockSuccessEvent'=>[
            'App\Listeners\Shop\Block\LevelConfirmation',
            'App\Listeners\Shop\Block\TemplateConfirmation',
            'App\Listeners\Shop\Block\PluginConfirmation',
            'App\Listeners\Shop\Block\SmsConfirmation',
        ],

        'App\Events\Customer\Wallet\WalletAmountEvent'=>[
            'App\Listeners\Customer\Wallet\WalletAmountInListener',
            'App\Listeners\Customer\Wallet\WalletAmountOutListener',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
