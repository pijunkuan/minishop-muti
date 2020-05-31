<?php

namespace App\Http\Controllers\Apps\Wallet;

use App\Events\Customer\Wallet\WalletAmountEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wallet\WalletStoreRequest;
use App\Http\Resources\Wallet\WalletCollection;
use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->findOrFail($request->route()->parameter('customer'));
        $wallets = $customer->wallets()->orderBy('created_at', 'desc');
        return $this->jsonSuccessResponse(new WalletCollection($wallets->paginate($request->get('pageSize'))));
    }

    public function store(WalletStoreRequest $request)
    {
        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->findOrFail($request->route()->parameter('customer'));
        event(new WalletAmountEvent($customer, $request->get('amount'), $request->get('type'), $request->get('content')));
        return $this->jsonSuccessResponse();
    }

    public function balance(Request $request)
    {
        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->findOrFail($request->route()->parameter('customer'));
        return $this->jsonSuccessResponse([
            "balance" => $customer->wallets()->sum('amount')
        ]);
    }
}
