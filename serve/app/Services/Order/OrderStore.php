<?php


namespace App\Services\Order;


use App\Models\Customer;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\Shipment;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;

class OrderStore
{
    static function order_calc($address = null, $items)
    {
        if ($address) {
            $address = self::address($address);
        }
        $order = self::order_init();
        $items = self::items($items);
        $suborders = self::suborders($items, $address);
        $order['address'] = $address;
        $order['items'] = $items;
        $order['suborders'] = $suborders;
        $suborders = collect($suborders);
        $order['items_amount'] = $suborders->sum('items_amount');
        $order['shipments_amount'] = $suborders->sum('shipments_amount');
        $order['amount'] = $order['items_amount'] + $order['shipments_amount'] - $order['discounts_amount'];
        return $order;
    }

    static function store(Customer $customer, $address, $items, $remark = null)
    {
        DB::beginTransaction();
        try {
            $address = self::address($address);
            $order_init = self::order_init($remark);
            $order = $customer->orders()->create($order_init);
            $order->address()->create($address);
            $items = self::items($items);
            $suborders=self::suborders($items, $address);
            self::items_create($order, $items);
            self::suborders_create($order,$suborders);

            $suborders = collect($suborders);
            $order->items_amount = $suborders->sum('items_amount');
            $order->shipments_amount = $suborders->sum('shipments_amount');
            $order->amount = $order->items_amount + $order->shipments_amount - $order->discounts_amount;
            $order->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => $exception->getMessage(),
                "body" => null,
            ], 422)));
        }
        $order->refresh();
        return $order;
    }


    private static function items($items)
    {
        $variants = array();
        foreach ($items as $item) {
            $variant = ProductVariant::find($item['variant_id']);
            $variants[] = [
                "variant_id" => $variant['id'],
                "variant_code" => $variant['variant_code'],
                "product_unit" => $variant->product['product_unit'],
                "product_title" => $variant->product['product_title'],
                "variant_title" => $variant['variant_title'],
                "price" => $variant['price'],
                "quantity" => $item['quantity'],
                "weight" => $variant['weight'],
                "shipment_id" => $variant->product['shipment_id']
            ];
        }
        return $variants;
    }

    private static function items_create(Order $order, $items)
    {
        foreach ($items as $item) {
            $order->items()->create([
                "variant_id" => $item['variant_id'],
                "variant_code" => $item['variant_code'],
                "product_unit" => $item['product_unit'],
                "product_title" => $item['product_title'],
                "variant_title" => $item['variant_title'],
                "price" => $item['price'],
                "quantity" => $item['quantity'],
                "weight" => $item['weight'],
            ]);
            if (ProductVariant::find($item['variant_id'])->decreaseStock($item['quantity']) <= 0) {
                throw (new HttpResponseException(response()->json([
                    'code' => 422,
                    "msg" => "该商品库存不足",
                    "data" => null,
                ], 422)));
            }
        }
    }

    private static function suborders($items, $address = null)
    {
        $i = 0;
        $suborders = array();
        foreach (collect($items)->groupBy("shipment_id") as $shipment_id => $items) {
            $suborders[$i] = [
                "shipment_id" => $shipment_id,
                "items_amount" => 0,
                "items_weight" => 0,
                "items_count" => 0,
                "shipments_amount" => 0,
                "items" => array()
            ];
            foreach ($items as $item) {
                $suborders[$i]['items'][] = [
                    "variant_id" => $item['variant_id'],
                    "variant_code" => $item['variant_code'],
                    "product_unit" => $item['product_unit'],
                    "product_title" => $item['product_title'],
                    "variant_title" => $item['variant_title'],
                    "price" => $item['price'],
                    "quantity" => $item['quantity'],
                    "weight" => $item['weight'],
                ];
                $suborders[$i]['items_amount'] += $item['quantity'] * $item['price'];
                $suborders[$i]['items_weight'] += $item['quantity'] * $item['weight'];
                $suborders[$i]['items_count'] += $item['quantity'];
            }
            $i++;
        }
        foreach ($suborders as $key => $suborder) {
            $shipment = Shipment::find($suborder['shipment_id']);
            if ($shipment) {
                if ($shipment['need_cost']) {
                    $rule = null;
                    if (isset($address['province']))
                        $rule = $shipment->rules()->where('area', 'like', "%{$address['province']}%")->first();
                    if ($rule) {
                        $shipment['price_1'] = $rule['price_1'];
                        $shipment['price_2'] = $rule['price_2'];
                        $shipment['value_1'] = $rule['value_1'];
                        $shipment['value_2'] = $rule['value_2'];
                    }
                    $shipments_amount = 0;
                    $calc_value = 0;
                    switch ($shipment['cost_type']) {
                        case Shipment::SHIPMENT_COST_NUMERIC:
                            $calc_value = $suborder['items_count'] - $shipment['value_1'];
                            break;
                        case Shipment::SHIPMENT_COST_WEIGHT:
                            $calc_value = $suborder['items_weight'] - $shipment['value_1'];
                            break;
                    }
                    $shipments_amount += $shipment['price_1'] * 1.00;
                    if ($shipment['value_2'] && $calc_value > 0) {
                        $shipments_amount += ceil($calc_value / $shipment['value_2']) * $shipment['price_2'];
                    }
                    $suborders[$key]['shipments_amount'] = $shipments_amount;
                    $suborders[$key]['shipment_name']= $shipment['shipment_name'];
                }
            }
        }
        return $suborders;
    }

    private static function suborders_create(Order $order, $suborders)
    {
        foreach ($suborders as $suborder) {
            $temp = $order->suborders()->create([
                "items_amount" => $suborder['items_amount'],
                "shipments_amount" => $suborder['shipments_amount'],
                "shipment_name" => $suborder['shipment_name']
            ]);
            foreach ($suborder['items'] as $item) {
                $temp->items()->create([
                    "variant_id" => $item['variant_id'],
                    "variant_code" => $item['variant_code'],
                    "product_unit" => $item['product_unit'],
                    "product_title" => $item['product_title'],
                    "variant_title" => $item['variant_title'],
                    "price" => $item['price'],
                    "quantity" => $item['quantity'],
                    "weight" => $item['weight'],
                ]);
            }
        }
    }

    private static function address($address)
    {
        return [
            'city' => isset($address['city']) ? $address['city'] : "",
            'district' => isset($address['district']) ? $address['district'] : "",
            'province' => isset($address['province']) ? $address['province'] : "",
            'detail' => isset($address['detail']) ? $address['detail'] : "",
            'zip' => isset($address['zip']) ? $address['zip'] : "",
            'name' => isset($address['name']) ? $address['name'] : "",
            'mobile' => isset($address['mobile']) ? $address['mobile'] : ""
        ];
    }

    private static function order_init($remark = null)
    {
        return [
            "items_amount" => 0,
            "shipments_amount" => 0,
            "discounts_amount" => 0,
            "amount" => 0,
            "remark" => $remark,
            "status" => Order::ORDER_STATUS_PENDING,
        ];
    }


}
