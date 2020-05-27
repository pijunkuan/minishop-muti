<?php

namespace App\Console;

use App\Console\Commands\Admin\Init\AdminInit;
use App\Console\Commands\System\Init;
use App\Console\Commands\System\WxBankList\WxBankListInit;
use App\Console\Commands\Wallet\ClearDailyConfirm;
use App\Console\Commands\Wallet\ShopClearConfirm;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        ClearDailyConfirm::class,
        ShopClearConfirm::class,
        Init::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function(){
            Log::info(now());
        })->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
