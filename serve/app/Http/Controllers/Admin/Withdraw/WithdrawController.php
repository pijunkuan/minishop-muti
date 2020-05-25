<?php

namespace App\Http\Controllers\Admin\Withdraw;

use App\Events\User\Wallet\WalletLogEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Withdraw\WithdrawListCollection;
use App\Http\Resources\User\Withdraw\WithdrawListResource;
use App\Models\User;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    public function index(Request $request)
    {
        $withdraw = new UserWalletWithdrawCashList();
        if ($request->get('status')) $withdraw = $withdraw->where("status", $request->get('status'));
        if ($request->get('mobile')) {
            $user = User::where('mobile',$request->get('mobile'))->first();
            $wallet = $user->wallet;
            if(!$wallet) return $this->jsonErrorResponse(422,"该用户未开启钱包");
            $withdraw = $withdraw->where('wallet_id',$wallet['id']);
        }
        if ($request->get('wallet_id')) $withdraw = $withdraw->where('wallet_id', $request->get('wallet_id'));
        $withdraw = $withdraw->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new WithdrawListCollection($withdraw));
    }

    public function update(Request $request)
    {
        $withdraw = UserWalletWithdrawCashList::where("no", $request->route()->parameter('withdraw'))->firstOrFail();
        if ($withdraw->status != UserWalletWithdrawCashList::CASH_STATUS_PENDING) return $this->jsonErrorResponse(422, "该提现状态无法操作");
        if ($status = $request->get('status')) {
            DB::beginTransaction();
            try {
                switch ($status) {
                    case UserWalletWithdrawCashList::CASH_STATUS_SUCCESS:
                        $withdraw->success_at = now();
                        break;
                    case UserWalletWithdrawCashList::CASH_STATUS_FAILED:
                        $withdraw->content = $request->get('content');
                        event(new WalletLogEvent($withdraw->wallet, ($withdraw['amount'] + $withdraw['fee']), 'in', "{$withdraw['no']}提现失败（金额：{$withdraw['amount']}，手续费：{$withdraw['fee']}）"));
                        break;
                    default:
                        return $this->jsonErrorResponse(422, "错误的状态代码");
                        break;
                }
                $withdraw->status = $status;
                $withdraw->save();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                return $this->jsonErrorResponse(422, "系统错误，更新失败");
            }
        }
        $withdraw->refresh();
        return $this->jsonSuccessResponse(new WithdrawListResource($withdraw));
    }
}
