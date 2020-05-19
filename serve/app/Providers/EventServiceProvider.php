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

        'App\Events\User\Wallet\OrderEvent'=>[
            'App\Listeners\User\Wallet\PaySuccessConfirmation'
        ],

        'App\Events\Order\OrderCancelEvent'=>[
            'App\Listeners\Order\OrderCancelConfirmation'
        ],
        'App\Events\Order\OrderRefundEvent'=>[
            'App\Listeners\Order\OrderRefundConfirmation'
        ],
        'App\Events\Order\OrderSuccessEvent'=>[
            'App\Listeners\Order\OrderSuccessConfirmation'
        ],
        'App\Events\Order\OrderCloseEvent'=>[
            'App\Listeners\Order\OrderCloseConfirmation'
        ],
        'App\Events\Order\OrderRefundSuccessEvent'=>[
            'App\Listeners\Order\OrderRefundSuccessConfirmation'
        ],
        'App\Events\Order\OrderRefundRefuseEvent'=>[
            'App\Listeners\Order\OrderRefundRefuseConfirmation'
        ],
        'App\Events\Order\OrderRefundCancelEvent'=>[
            'App\Listeners\Order\OrderRefundCancelConfirmation'
        ],

        'App\Events\Order\Pay\PayCreateEvent'=>[
            'App\Listeners\Order\Pay\Create\WalletCreateConfirmation',
            'App\Listeners\Order\Pay\Create\CashCreateConfirmation',
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
        ],



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
