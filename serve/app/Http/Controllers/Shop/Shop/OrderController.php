<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\OrderStoreRequest;
use App\Services\Shop\ShopOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        $order = ShopOrderService::store(auth('users')->user(),$request);

        return $this->jsonSuccessResponse($order);
    }
}
