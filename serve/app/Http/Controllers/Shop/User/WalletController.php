<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Log\LogListCollection;
use App\Models\UserWalletClearList;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function store(Request $request)
    {
        if($wallet = auth('users')->user()->wallet) return $this->jsonErrorResponse(404,"已创建钱包");
        auth('users')->user()->wallet()->create();
        return $this->jsonSuccessResponse(null,"创建钱包成功");
    }

    public function show(Request $request)
    {

        if(!$wallet = auth('users')->user()->wallet) return $this->jsonErrorResponse(404,"尚未创建钱包");
        return $this->jsonSuccessResponse([
           "balance"=>$wallet['balance'],
           "locked_amount"=>$wallet->clear_lists()->where('status',UserWalletClearList::CLEAR_STATUS_PENDING)->sum('amount'),
        ]);
    }

    public function log_index(Request $request)
    {
        $wallet = auth('users')->user()->wallet;
        $lists = $wallet->log_lists()->paginate(10);
        return $this->jsonSuccessResponse(new LogListCollection($lists));

    }
}
