<?php

namespace App\Http\Controllers\Admin\Income;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Income\IncomeListCollection;
use App\Models\User;
use App\Models\UserWalletIncome;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $incomes = new UserWalletIncome();
        if ($clear_no = $request->get('clear_no')) $incomes = $incomes->where('clear_no', $clear_no);
        if ($request->get('mobile')) {
            $user = User::where('mobile', $request->get('mobile'))->firstOrFail();
            $wallet = $user->wallet;
            if (!$wallet) return $this->jsonErrorResponse(422, "该用户未开启钱包");
            $incomes = $incomes->where('wallet_id', $wallet['id']);
        }
        if($walletId = $request->get('wallet_id')){
            $incomes = $incomes->where('wallet_id',$walletId);
        }
        if($no = $request->get('no')){
            $incomes = $incomes->where('no',$no);
        }
        $incomes = $incomes->orderBy('created_at', "desc")->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new IncomeListCollection($incomes));
    }
}
