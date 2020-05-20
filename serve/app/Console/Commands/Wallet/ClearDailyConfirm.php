<?php

namespace App\Console\Commands\Wallet;

use App\Events\User\Wallet\ClearEvent;
use App\Models\UserWalletClearList;
use Illuminate\Console\Command;

class ClearDailyConfirm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:clear_daily_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'daily clear check';

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
        $clearLists = UserWalletClearList::where('status',"pending")->where("unlocked_at","<",now()->subDay()->endOfDay())->get();
        foreach ($clearLists as $clearList){
            event(new ClearEvent($clearList));
        }
        $this->info("已完成");
    }
}
