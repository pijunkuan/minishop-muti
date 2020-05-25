<?php

namespace App\Http\Controllers\Admin\Wallet;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Wallet\WalletListCollection;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        $wallets = new UserWallet();
        if($request->get('mobile')){
            $user = User::where('mobile',$request->get('mobile'))->first();
            $wallets = $wallets->where('user_id',$user['id']);
        }
        $wallets = $wallets->orderBy('created_at',"desc")->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new WalletListCollection($wallets));
    }
}
