<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Order\OrderListCollection;
use App\Models\ShopOrder;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = new ShopOrder();
        if($request->get('mobile')){
            $user = User::where('mobile',$request->get('mobile'))->firstOrFail();
            $orders = $orders->where('user_id',$user['id']);
        }
        $orders = $orders->orderBy('created_at','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new OrderListCollection($orders));
    }
}
