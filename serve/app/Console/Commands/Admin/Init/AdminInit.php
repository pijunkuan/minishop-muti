<?php

namespace App\Console\Commands\Admin\Init;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'admins table init';

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
        if($admin = Admin::where('username','admin')->first()){
            $admin['password'] = Hash::make("123456");
            $admin->save();
        }else{
            Admin::create([
                "username" => "admin",
                "password" => Hash::make('123456')
            ]);
        }
        $this->info('初始化完成，用户名：admin，密码：123456');
    }
}
