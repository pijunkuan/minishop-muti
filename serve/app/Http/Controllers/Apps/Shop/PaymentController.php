<?php

namespace App\Http\Controllers\Apps\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\Method\MethodListResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $payment_methods;

    public function __construct()
    {
        $this->payment_methods = config('shop_payment_methods.methods');
    }

    public function sys_index()
    {
        return $this->jsonSuccessResponse($this->payment_methods);
    }

    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $payment_methods = $shop->payment_methods;
        return $this->jsonSuccessResponse(MethodListResource::collection($payment_methods));
    }

    public function store(Request $request)
    {
        $shop = $request->get('ori_shop');
        $sys_methods = collect($this->payment_methods);
        if (!$payment_method = $sys_methods->where('code', $request->route()->parameter('code'))->first()) {
            return $this->jsonErrorResponse(404, "无此支付方式");
        }
        if($shop->payment_methods()->where('payment_method_code',$request->route()->parameter('code'))->first()){
            return $this->jsonErrorResponse(404, "已添加该支付方式");
        }
        if($payment_method['need_wallet']){
            if(!$shop->user->wallet) return $this->jsonErrorResponse(422,"尚未开启代收钱包，请先开启代收钱包");
        }
        $rs = $shop->payment_methods()->create([
            "payment_method_code"=>$payment_method['code'],
            "payment_method_title"=>$payment_method['title'],
            "active"=>!$payment_method['need_setting']
        ]);
        $rs->refresh();
        return $this->jsonSuccessResponse($rs);
    }

    public function destroy(Request $request)
    {
        $shop = $request->get('ori_shop');
        $payment = $shop->payment_methods()->where('payment_method_code',$request->route()->parameter('code'))->first();
        if(!$payment) return $this->jsonErrorResponse(404,"无此支付方式");
        $payment->delete();
        return $this->jsonSuccessResponse(null,"停用成功");
    }

}
