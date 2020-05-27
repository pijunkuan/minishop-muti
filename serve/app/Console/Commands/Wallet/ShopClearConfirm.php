<?php

namespace App\Console\Commands\Wallet;

use App\Events\User\Wallet\ShopClearEvent;
use App\Models\Shop;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ShopClearConfirm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:clear_shop_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每日店铺代收结算';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::channel('clear')->info("每日结算开始".now());
        Shop::chunk(100,function($shops){
            foreach($shops as $shop){
                event(new ShopClearEvent($shop));
            }
        });
    }
}
