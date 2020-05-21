<?php

namespace App\Http\Controllers\Shop\User;

use App\Events\User\Wallet\WalletLogEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Wallet\WithdrawAccountStoreRequest;
use App\Http\Requests\User\Wallet\WithdrawStoreRequest;
use App\Http\Resources\User\Withdraw\WithdrawListCollection;
use App\Models\SysAccountWay;
use App\Models\SysWxBankList;
use App\Models\UserWalletAccount;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    public function way_list()
    {
        $lists = SysAccountWay::where("active", true)->get();
        return $this->jsonSuccessResponse($lists);
    }

    public function bank_list()
    {
        return $this->jsonSuccessResponse(SysWxBankList::get());
    }

    public function account_store(WithdrawAccountStoreRequest $request)
    {
        if (!$wallet = auth('users')->user()->wallet) return $this->jsonErrorResponse(404, "尚未创建钱包");
        $data = array();
        $way = $request->get('way');
        $bank = null;
        if (!in_array($way, ['alipay', 'wxpay', 'bank']))
            return $this->jsonErrorResponse(401, "方式代码不存在");
        $data['way'] = $way;
        $account = $request->get('account');
        if ($way == "bank") {
            if (!isset($account['open_bank_code'])) return $this->jsonErrorResponse(422, "银行卡提现必须填写银行代码");
            if (!$bank = SysWxBankList::where('open_bank_code', $account['open_bank_code'])->first()) return $this->jsonErrorResponse(422, "无效的银行代码");
        }
        $data['account'] = [
            "id" => $account['id'],
            "name" => $account['name'],
            "bank" => isset($account['open_bank_code']) ? $bank['bank'] : null,
            "open_bank_code" => isset($account['open_bank_code']) ? $bank['open_bank_code'] : null,
        ];
        $account = $wallet->accounts()->create($data);
        return $this->jsonSuccessResponse($account);
    }

    public function account_index()
    {
        $accounts = auth('users')->user()->wallet->accounts;
        return $this->jsonSuccessResponse($accounts);
    }

    public function account_destroy(Request $request)
    {
        $account = auth('users')->user()->wallet->accounts()->findOrFail($request->route()->parameter('account'));
        $account->delete();
        return $this->jsonSuccessResponse(null, "删除成功");
    }

    public function withdraw_index(Request $request)
    {
        $lists = auth('users')->user()->wallet->withdraw_lists();
        $lists = $lists->orderBy("created_at", "desc")->paginate(10);
        return $this->jsonSuccessResponse(new WithdrawListCollection($lists));
    }

    public function withdraw_store(WithdrawStoreRequest $request)
    {
        $wallet = auth('users')->user()->wallet;
        $account = $wallet->accounts()->findOrFail($request->get('account_id'));
        $amount = $request->get('amount');
        $way = SysAccountWay::where('way', $account['way'])->firstOrFail();
        $fee = $amount * $way['fee'] * 0.01;
        if ($way['fee_min']) {
            if ($fee < $way['fee_min']) $fee = $way['fee_min'];
        }
        if ($way['fee_max']) {
            if ($fee > $way['fee_max']) $fee = $way['fee_max'];
        }
        if (($amount + $fee) > $wallet['balance']) return $this->jsonErrorResponse(422, "提现金额 不足");
        if ($way['daily_limit']) {
            $daily_amount = $wallet->withdraw_lists()->whereDate('user_wallet_withdraw_cash_lists.created_at', now()->toDateString())->sum('amount');
            if (($daily_amount + $amount) > $way['daily_limit']) return $this->jsonErrorResponse(422, "超过当日提现金额");
        }
        DB::beginTransaction();
        try {
            $withdraw = $wallet->withdraw_lists()->create([
                "amount" => $amount,
                "way" => $account['way'],
                "fee" => $fee,
                "account" => [
                    "id" => isset($account['account']['id']) ? $account['account']['id'] : null,
                    "name" => isset($account['account']['name']) ? $account['account']['name'] : null,
                    "bank" => isset($account['account']['bank']) ? $account['account']['bank'] : null,
                    "open_bank_code" => isset($account['account']['open_bank_code']) ? $account['account']['open_bank_code'] : null,
                ]
            ]);
            $withdraw->refresh();
            event(new WalletLogEvent($wallet, $amount + $fee, 'out', "{$withdraw['no']}提现（金额：{$amount}，手续费：{$fee}）"));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->jsonErrorResponse(422, "系统错误，提现失败");
        }
        return $this->jsonSuccessResponse($withdraw);
    }
}
