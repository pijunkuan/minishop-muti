<?php

namespace App\Http\Controllers\Admin\ClearList;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Clear\ClearListCollection;
use App\Models\UserWalletClearList;
use Illuminate\Http\Request;

class ClearListController extends Controller
{
    public function index(Request $request)
    {
        $lists = new UserWalletClearList();
        if($status = $request->get('status')) $lists = $lists->where('status',$status);
        $lists = $lists->orderBy('created_at','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new ClearListCollection($lists));
    }
}
