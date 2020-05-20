<?php

namespace App\Http\Controllers\Admin\Withdraw;

use App\Http\Controllers\Controller;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        $withdraw = new UserWalletWithdrawCashList();

        $withdraw = $withdraw->orderBy('created_at','desc')->paginate(10);
        return $this->jsonSuccessResponse($withdraw);
    }
}
