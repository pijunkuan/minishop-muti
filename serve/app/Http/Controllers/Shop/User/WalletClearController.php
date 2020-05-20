<?php

namespace App\Http\Controllers\Shop\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\Clear\ClearListCollection;
use App\Http\Resources\User\Income\IncomeListCollection;
use Illuminate\Http\Request;

class WalletClearController extends Controller
{
    public function index(Request $request)
    {
        $wallet = auth('users')->user()->wallet;
        $lists = $wallet->clear_lists()->orderBy("created_at","desc")->paginate(10);
        return $this->jsonSuccessResponse(new ClearListCollection($lists));
    }

    public function income_list(Request $request)
    {
        $wallet = auth('users')->user()->wallet;
        $lists = $wallet->incommes()->orderBy("created_at","desc")->paginate(10);
        return $this->jsonSuccessResponse(new IncomeListCollection($lists));
    }
}
