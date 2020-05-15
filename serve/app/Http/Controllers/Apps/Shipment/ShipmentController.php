<?php

namespace App\Http\Controllers\Apps\Shipment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shipment\ShipmentRequest;
use App\Http\Resources\Shipment\ShipmentDetailResource;
use App\Http\Resources\Shipment\ShipmentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{

    public function type_list()
    {
        $methods = config('shop_shipment_methods.methods');
        return $this->jsonSuccessResponse($methods);
    }

    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $shipments = $shop->shipments;
        return $this->jsonSuccessResponse(ShipmentResource::collection($shipments));
    }


    public function store(ShipmentRequest $request)
    {
        //        if (Shipment::count() > 5) return $this->jsonErrorResponse(405, "超过最大运费模板设置范围（5）");

        $shop = $request->get('ori_shop');

        DB::beginTransaction();
        try {
            $shipment = $shop->shipments()->create([
                "shipment_code" => $request->get('shipment_code'),
                "shipment_name" => $request->get('shipment_name'),
                "need_cost" => $request->get('cost_type_code'),
                "cost_type" => $request->get('cost_type'),
            ]);
            if ($request->get('need_cost')) {
                $shipment->update([
                    "price_1"=>$request->get('price_1'),
                    "value_1"=>$request->get('value_1'),
                    "price_2"=>$request->get('price_2'),
                    "value_2"=>$request->get('value_2'),
                ]);
                foreach ($request->get('rules') as $item) {
                    $shipment->rules()->create([
                        "area" => $item['area'],
                        "price_1" => $item['price_1'],
                        "value_1" => $item['value_1'],
                        "price_2" => $item['price_2'],
                        "value_2" => $item['value_2'],
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->jsonErrorResponse(404, $exception->getMessage());
        }
        $shipment->refresh();
        return $this->jsonSuccessResponse(new ShipmentDetailResource($shipment));
    }

    public function show(Request $request)
    {
        $shop = $request->get('ori_shop');
        $shipment = $shop->shipments()->findOrFail($request->route()->parameter('shipment'));
        return $this->jsonSuccessResponse(new ShipmentDetailResource($shipment));
    }

    public function destroy(Request $request)
    {
        $shop = $request->get('ori_shop');
        $shipment = $shop->shipments()->findOrFail($request->route()->parameter('shipment'));
        if ($shipment->products()->count()) return $this->jsonErrorResponse(422, "该运费模板有商品绑定,无法删除");
        $shipment->delete();
        return $this->jsonSuccessResponse();
    }

    public function update(ShipmentRequest $request)
    {
        $shop = $request->get('ori_shop');
        $shipment = $shop->shipments()->findOrFail($request->route()->parameter('shipment'));
        DB::beginTransaction();
        try {
            $shipment->update([
                "shipment_code" => $request->get('shipment_code'),
                "shipment_name" => $request->get('shipment_name'),
                "need_cost" => $request->get('need_cost'),
                "cost_type" => $request->get('cost_type_code'),
                ]);
            $shipment->rules()->delete();
            if ($request->get('need_cost')) {
                $shipment->update([
                    "price_1"=>$request->get('price_1'),
                    "value_1"=>$request->get('value_1'),
                    "price_2"=>$request->get('price_2'),
                    "value_2"=>$request->get('value_2'),
                ]);
                foreach ($request->get('rules') as $item) {
                    $shipment->rules()->create([
                        "area" => $item['area'],
                        "price_1" => $item['price_1'],
                        "value_1" => $item['value_1'],
                        "price_2" => $item['price_2'],
                        "value_2" => $item['value_2'],
                    ]);
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->jsonErrorResponse(404, $exception->getMessage());
        }
        $shipment->refresh();
        return $this->jsonSuccessResponse(new ShipmentDetailResource($shipment));
    }
}
