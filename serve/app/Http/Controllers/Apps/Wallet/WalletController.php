<?php

namespace App\Http\Controllers\Apps\Wallet;

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
        $amount = 0;
        $type = $request->get('type');
        switch($type){
            case Wallet::WALLET_IN:
                $amount = abs($request->get('amount'));
                break;
            case Wallet::WALLET_OUT:
                $amount = 0 - abs($request->get('amount'));
                break;
        }
        $content = $request->get('content');
        $wallet = $customer->wallets()->create([
            "amount"=>$amount,
            "type"=>$type,
            "content"=>$content
        ]);
        return $this->jsonSuccessResponse($wallet);
    }

    public function balance(Request $request)
    {
        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->findOrFail($request->route()->parameter('customer'));
        return $this->jsonSuccessResponse([
            "balance"=>$customer->wallets()->sum('amount')
        ]);
    }
}
