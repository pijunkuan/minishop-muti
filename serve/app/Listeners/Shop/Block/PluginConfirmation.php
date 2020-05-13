<?php

namespace App\Listeners\Shop\Block;

use App\Events\Shop\Block\BlockSuccessEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PluginConfirmation
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
     * @param  BlockSuccessEvent  $event
     * @return void
     */
    public function handle(BlockSuccessEvent $event)
    {
        //
    }
}
