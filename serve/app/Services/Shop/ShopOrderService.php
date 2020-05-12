<?php


namespace App\Services\Shop;


use App\Models\Shop;
use App\Models\ShopOrder;
use App\Models\SysLevelVariant;
use App\Models\SysPluginVariant;
use App\Models\SysTemplateVariant;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopOrderService
{
    static function store(User $user, Request $request)
    {

        $order = self::order_init(Shop::find($request->get('shop_id')));
        $items = self::item_init($request->get('items'));
        $order['ori_amount'] = collect($items)->sum('price');
        $order['amount'] = $order['ori_amount'] - $order['discounts_amount'];
        $payment = self::payment_init($order,$request->get('payment_method'));
        DB::beginTransaction();
        try{
            $order = $user->shopOrders()->create($order);
            foreach($items as $item){
                $order->items()->create($item);
            }
            $order->payments()->create($payment);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "msg" => $exception->getMessage(),
                "data" => null,
            ], 422)));
        }
        return $order;
    }

    private static function order_init(Shop $shop)
    {
        return [
            "ori_amount" => 0,
            "discounts_amount" => 0,
            "amount" => 0,
            "shop_id" => $shop['id'],
            "shop_name" => $shop['shop_name']
        ];
    }
    private static function item_init($items){
        $order_items = array();
        foreach ($items as $item) {
            $temp = null;
            switch ($item['type']) {
                case "template":
                    $temp = SysTemplateVariant::find($item['item_id']);
                    $order_items[] = [
                        "item_id" => $temp['id'],
                        "item_name" => $temp->template['template_name'],
                        "type" => $item['type'],
                        "price" => $temp['price'],
                        "time" => $temp['time']
                    ];
                    break;
                case "level":
                    $temp = SysLevelVariant::find($item['item_id']);
                    $order_items[] = [
                        "item_id" => $temp['id'],
                        "item_name" => $temp->level['level_name'],
                        "type" => $item['type'],
                        "price" => $temp['price'],
                        "time" => $temp['time']
                    ];
                    break;
                case "plugin":
                    $temp = SysPluginVariant::find($item['item_id']);
                    $order_items[] = [
                        "item_id" => $temp['id'],
                        "item_name" => $temp->plugin['plugin_name'],
                        "type" => $item['type'],
                        "price" => $temp['price'],
                        "time" => $temp['time']
                    ];
                    break;
            }
        }
        return $order_items;
    }

    private static function payment_init($order,$method){
        return [
            'payment_method'=>$method,
            'amount'=>$order['amount'],
        ];
    }
}
