<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Events\Shop\Pay\PaySuccessEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\OrderStoreRequest;
use App\Http\Resources\Shop\Order\OrderResource;
use App\Models\ShopOrderPayment;
use App\Services\Shop\ShopOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        $order = ShopOrderService::store(auth('users')->user(), $request);
        if ($order->amount == 0) {
            $payment = $order->payments()->whereIn('status', [ShopOrderPayment::PAYMENT_STATUS_PENDING])->first();
            event(new PaySuccessEvent($payment, "-"));
        }
        return $this->jsonSuccessResponse(new OrderResource($order->refresh()));
    }

    public function show($order_no)
    {
        $order = auth('users')->user()->shopOrders()->where('no', $order_no)->first();
        return $this->jsonSuccessResponse(new OrderResource($order));
    }

    public function success($payment_no)
    {
        $payment = ShopOrderPayment::where('no', $payment_no)->first();
        if (!$payment) return $this->jsonErrorResponse(401, '不存在该支付单');
        if ($payment->status == ShopOrderPayment::PAYMENT_STATUS_PAID) return $this->jsonErrorResponse(401, '已支付');
        if ($payment->status == ShopOrderPayment::PAYMENT_STATUS_CLOSED) return $this->jsonErrorResponse(401, '已关闭');
        event(new PaySuccessEvent($payment, 'test123'));
        return $this->jsonSuccessResponse();
    }
}
