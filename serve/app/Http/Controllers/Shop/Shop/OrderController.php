<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Events\Shop\Pay\PaySuccessEvent;
use App\Exports\Order\OrderDownload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\OrderStoreRequest;
use App\Http\Resources\Shop\Order\OrderListCollection;
use App\Http\Resources\Shop\Order\OrderResource;
use App\Models\ShopOrder;
use App\Models\ShopOrderPayment;
use App\Services\Shop\ShopOrderService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = auth('users')->user()->shopOrders();
        $orders = $orders->where('status',ShopOrder::ORDER_STATUS_PAID)->orderBy('created_at','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new OrderListCollection($orders));
    }

    public function store(OrderStoreRequest $request)
    {
        $order = ShopOrderService::store(auth('users')->user(), $request);
        if ($order->amount == 0) {
            $payment = $order->payments()->whereIn('status', [ShopOrderPayment::PAYMENT_STATUS_PENDING])->first();
            event(new PaySuccessEvent($payment, "-"));
        }
        return $this->jsonSuccessResponse(new OrderResource($order->refresh()));
    }

    public function show(Request $request)
    {
        $order = auth('users')->user()->shopOrders()->where('no', $request->route()->parameter('order_no'))->first();
        return $this->jsonSuccessResponse(new OrderResource($order));
    }

    public function download(Request $request){
        $orders = auth('users')->user()->shopOrders()->get();
        return Excel::download(new OrderDownload($orders),'order.csv');
    }


}
