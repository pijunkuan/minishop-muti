<?php

namespace App\Http\Controllers\Front\Payment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\Method\MethodListResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function methods(Request $request)
    {
        $shop = $request->get('ori_shop');
        $methods = $shop->payment_methods()->where('active',true)->get();
        return $this->jsonSuccessResponse(MethodListResource::collection($methods));
    }
}
