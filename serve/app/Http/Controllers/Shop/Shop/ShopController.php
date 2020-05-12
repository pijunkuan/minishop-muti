<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\ShopStoreRequest;
use App\Http\Resources\Shop\ShopResource;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = auth('users')->user()->shops;
        return $this->jsonSuccessResponse(ShopResource::collection($shops));
    }

    public function store(ShopStoreRequest $request)
    {
        $shop = auth('users')->user()->shops()->make();
        $shop->shop_name = $request->get('shop_name');
        $shop->save();
        return $this->jsonSuccessResponse($shop);
    }
}
