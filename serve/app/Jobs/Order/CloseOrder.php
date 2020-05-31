<?php

namespace App\Jobs\Order;

use App\Events\Order\Status\OrderStatusEvent;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CloseOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    protected $order;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     * @param $delay
     */
    public function __construct(Order $order, $delay)
    {
        $this->connection = "redis";
        $this->queue = "order";
        $this->order = $order;
        // 设置延迟的时间，delay() 方法的参数代表多少秒之后执行
        $this->delay($delay * 60);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order;
        if ($order['status'] != Order::ORDER_STATUS_PENDING) return;
        event(new OrderStatusEvent($order, Order::ORDER_STATUS_CANCEL, "付款超时"));
    }
}
