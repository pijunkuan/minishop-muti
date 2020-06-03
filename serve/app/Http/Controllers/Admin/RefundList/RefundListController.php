<?php

namespace App\Http\Controllers\Admin\RefundList;

use App\Events\User\Wallet\Refund\WalletRefundConfirmEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Refund\RefundCollection;
use App\Http\Resources\User\Refund\RefundDetailResource;
use App\Models\User;
use App\Models\UserWalletRefundList;
use App\Services\PingXX\PingXX;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RefundListController extends Controller
{
    public function index(Request $request)
    {
        $lists = new UserWalletRefundList();
        if ($request->get('mobile')) {
            $user = User::where('mobile', $request->get('mobile'))->firstOrFail();
            $wallet = $user->wallet;
            if (!$wallet) return $this->jsonErrorResponse(422, "该用户未开启钱包");
            $lists = $lists->where('wallet_id', $wallet['id']);
        }
        if ($request->get('record_no')) $lists = $lists->where('record_no', $request->get('record_no'));
        if ($request->get('status')) $lists = $lists->where('status', $request->get('status'));
        if ($request->get('order_no')) $lists = $lists->where('order_no', $request->get('order_no'));
        $lists = $lists->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new RefundCollection($lists));
    }

    public function show(Request $request)
    {
        $list = UserWalletRefundList::where('no', $request->route()->parameter('refund'))->firstOrFail();
        return $this->jsonSuccessResponse(new RefundDetailResource($list));
    }

    public function update(Request $request)
    {
        $list = UserWalletRefundList::where('no', $request->route()->parameter('refund'))->firstOrFail();
        if ($list['status'] != 'pending') return $this->jsonErrorResponse(422, "状态不允许操作");
        $validator = Validator::make($request->all(), [
            'status' => "required|string",
            "content" => "nullable"
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            switch ($data['status']) {
                case "processing":
                    $params = [
                        'pay_no' => $list['pay_no'],
                        "content" => $list['content'],
                        "amount" => $list['amount']
                    ];
                    $pingxx = new PingXX(env('FRONT_PING_ID'));
                    $ch = $pingxx->refund_create($params);
                    switch ($ch['status']) {
                        case "failed":
                            return $this->jsonErrorResponse(422, $ch['failure_msg'], $ch);
                            break;
                        case "pending":
                            $list->update(['status'=>$data['status'],"refund_no"=>$ch['id']]);
                            return $this->jsonSuccessResponse($ch,$ch['failure_msg']??"发起退款成功");
                            break;
                        default:
                            return $this->jsonErrorResponse(422,"错误的返回状态码",$ch);
                            break;
                    }
                    break;
                case "failed":

                    event(new WalletRefundConfirmEvent($list,"failed",isset($data['content'])?$data['content']:null));
                    break;
                default:
                    return $this->jsonErrorResponse(422, "非法的状态码");
                    break;
            }
        }


        return $this->jsonSuccessResponse();
    }
}
