<?php

namespace App\Http\Controllers\Shop\User;

use App\Events\User\Wallet\WalletLogEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Wallet\WithdrawAccountStoreRequest;
use App\Http\Requests\User\Wallet\WithdrawStoreRequest;
use App\Http\Resources\User\Withdraw\WithdrawListCollection;
use App\Models\UserWalletAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    public function way_list()
    {
        $lists = [
            [
                "way" => UserWalletAccount::ALIPAY,
                "title" => UserWalletAccount::accountWayMap[UserWalletAccount::ALIPAY]
            ],
            [
                "way" => UserWalletAccount::BANK,
                "title" => UserWalletAccount::accountWayMap[UserWalletAccount::BANK]
            ],
//            [
//                "way"=>UserWalletAccount::WXPAY,
//                "title"=>UserWalletAccount::accountWayMap[UserWalletAccount::WXPAY]
//            ],

        ];
        return $this->jsonSuccessResponse($lists);
    }

    public function account_store(WithdrawAccountStoreRequest $request)
    {
        if (!$wallet = auth('users')->user()->wallet) return $this->jsonErrorResponse(404, "尚未创建钱包");
        $data = array();
        $way = $request->get('way');
        if (!in_array($way, ['alipay', 'wxpay', 'bank']))
            return $this->jsonErrorResponse(401, "方式代码不存在");
        $data['way'] = $way;
        $account = $request->get('account');
        $data['account'] = [
            "id" => $account['id'],
            "name" => $account['name'],
            "bank" => isset($account['bank']) ? $account['bank'] : null,
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
        if ($amount > $wallet['balance']) return $this->jsonErrorResponse(422, "提现金额 不足");
        $fee = 0;
        DB::beginTransaction();
        try{
            $withdraw = $wallet->withdraw_lists()->create([
                "amount"=>$amount,
                "way"=>$account['way'],
                "fee"=>$fee,
                "account"=>[
                    "id"=>isset($account['account']['id'])?$account['account']['id']:null,
                    "name"=>isset($account['account']['name'])?$account['account']['name']:null,
                    "bank"=>isset($account['account']['bank'])?$account['account']['bank']:null,
                ]
            ]);
            $withdraw->refresh();
            event(new WalletLogEvent($wallet,$amount,'out',"{$withdraw['no']}提现（金额：{$amount}，手续费：{$fee}）"));
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->jsonErrorResponse(422,"系统错误，提现失败");
        }
        return $this->jsonSuccessResponse($withdraw);
    }
}
