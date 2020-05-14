<?php

namespace App\Http\Controllers\Apps\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Customer\CustomerCollection;
use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $customers = $shop->customers();
        if ($mobile = $request->get('mobile'))
            $customers = $customers->where('mobile', 'like', "%{$mobile}%");
        if ($username = $request->get('username'))
            $customers = $customers->where('username', 'like', "%{$username}%");
        $customers = $customers->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new CustomerCollection($customers));
    }

    public function update(Request $request)
    {
        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->findOrFail($request->route()->parameter('customer'));
        if ($request->get('password'))
            $customer->password = Hash::make($request->get('password'));
        $customer->save();
        $customer->refresh();
        return $this->jsonSuccessResponse(new CustomerResource($customer));
    }
}
