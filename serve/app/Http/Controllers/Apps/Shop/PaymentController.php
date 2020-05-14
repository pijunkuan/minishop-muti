<?php

namespace App\Http\Controllers\Apps\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function sys_index()
    {
        return $this->jsonSuccessResponse(config('shop_payment_methods'));
    }
}
