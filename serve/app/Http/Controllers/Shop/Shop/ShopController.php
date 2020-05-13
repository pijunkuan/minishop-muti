<?php

namespace App\Http\Controllers\Shop\Shop;

use App\Events\Shop\Block\BlockSuccessEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Shop\ShopStoreRequest;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop;
use App\Models\ShopOrder;
use App\Models\ShopOrderPayment;
use App\Models\SysLevelVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index()
    {
        $shops = auth('users')->user()->shops;
        return $this->jsonSuccessResponse(ShopResource::collection($shops));
    }

    public function store(ShopStoreRequest $request)
    {
        DB::beginTransaction();
        try{
            $order = ShopOrder::where('no',$request->get('order_no'))->first();
            $shop = auth('users')->user()->shops()->make();
            $shop->shop_name = $request->get('shop_name');
            $shop->status = Shop::SHOP_STATUS_ACTIVE;
            $shop->active = true;
            $shop->save();
            $order->update([
               "shop_id"=>$shop['id'],
               "shop_name"=>$shop['shop_name']
            ]);
            event(new BlockSuccessEvent($shop,$order->item['type'],$order->item['sys_block_id'],$order->item['time']));
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->jsonErrorResponse(422,'创建失败，请查看日志');
        }

        return $this->jsonSuccessResponse($shop);
    }
}
