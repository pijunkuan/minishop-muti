<?php

namespace App\Http\Controllers\Admin\ClearList;

use App\Events\User\Wallet\ClearEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Clear\ClearListCollection;
use App\Models\UserWalletClearList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClearListController extends Controller
{
    public function index(Request $request)
    {
        $lists = new UserWalletClearList();
        if ($status = $request->get('status')) $lists = $lists->where('status', $status);
        $lists = $lists->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new ClearListCollection($lists));
    }

    public function update(Request $request)
    {
        $list = UserWalletClearList::findOrFail($request->route()->parameter('clear'));
        if ($list['status'] != UserWalletClearList::CLEAR_STATUS_PENDING) return $this->jsonErrorResponse(422, "该状态无法更新");
        if ($status = $request->get('status')) {
            DB::beginTransaction();
            try {
                switch ($status) {
                    case UserWalletClearList::CLEAR_STATUS_SUCCESS:
                        event(new ClearEvent($list));
                        break;
                    default:
                        return $this->jsonErrorResponse(422, "错误的状态代码");
                        break;
                }
                $list->status = $status;
                $list->save();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error($exception->getMessage());
                return $this->jsonErrorResponse(422, "系统错误，更新失败");
            }
        }
    }
}
