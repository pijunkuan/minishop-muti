<?php

namespace App\Http\Controllers\Apps\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function info(Request $request)
    {
        $shop = $request->get('ori_shop');
        return $this->jsonSuccessResponse(new ShopResource($shop));
    }

    public function update(Request $request)
    {
        $shop = $request->get('ori_shop');
        if ($request->has('shop_name')) $shop->shop_name = $request->get('shop_name');
        if ($request->has('shop_url')) {
            if ($shop->level->level['domain_edit']){
                if (Shop::where('id', "<>", $shop['id'])->where('shop_url', $request->get('shop_url'))->first()) {
                    return $this->jsonErrorResponse(401, "商铺链接已存在，不可重复");
                }
                $shop->shop_url = $request->get('shop_url');
            }
        }
        if ($request->has('status')) {
            if (!in_array($request->get('status'), [
                Shop::SHOP_STATUS_ACTIVE,
                Shop::SHOP_STATUS_PENDING,
            ])) {
                return $this->jsonErrorResponse(401, '非法status代码');
            }
            $shop->status = $request->get('status');
        }
        if ($request->has('active')) {
            $shop->status = $request->get('status') ? true : false;
        }
        $shop->save();
        $shop->refresh();
        return $this->jsonSuccessResponse(new ShopResource($shop));
    }
}
