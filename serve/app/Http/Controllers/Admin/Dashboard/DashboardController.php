<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use App\Models\UserWalletClearList;
use App\Models\UserWalletIncome;
use App\Models\UserWalletRefundList;
use App\Models\UserWalletWithdrawCashList;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $today, $yesterday, $week;

    public function __construct()
    {
        $this->today = [now()->startOfDay(), now()->endOfDay()];
        $this->yesterday = [now()->subDay()->startOfDay(), now()->subDay()->endOfDay()];
        $this->week = [now()->startOfWeek(), now()->endOfWeek()];
    }

    public function user_static()
    {
        $data = new User();
        $rs = [
            "today" => $data->whereBetween('created_at', $this->today)->count(),
            "yesterday" => $data->whereBetween('created_at', $this->yesterday)->count(),
            "week" => $data->whereBetween('created_at', $this->week)->count(),
        ];
        return $this->jsonSuccessResponse($rs);
    }

    public function shop_static()
    {
        $data = new Shop();
        $rs = [
            "today" => $data->whereBetween('created_at', $this->today)->count(),
            "yesterday" => $data->whereBetween('created_at', $this->yesterday)->count(),
            "week" => $data->whereBetween('created_at', $this->week)->count(),
        ];
        return $this->jsonSuccessResponse($rs);
    }

    public function income_static()
    {
        $data = new UserWalletIncome();
        $rs = [
            "count"=>[
                "today" => $data->whereBetween('created_at', $this->today)->count(),
                "yesterday" => $data->whereBetween('created_at', $this->yesterday)->count(),
                "week" => $data->whereBetween('created_at', $this->week)->count(),
            ],
            "amount" => [
                "today" => $data->whereBetween('created_at', $this->today)->sum('amount'),
                "yesterday" => $data->whereBetween('created_at', $this->yesterday)->sum('amount'),
                "week" => $data->whereBetween('created_at', $this->week)->sum('amount'),
            ],
        ];
        return $this->jsonSuccessResponse($rs);
    }

    public function clear_static()
    {
        $data = new UserWalletClearList();
        $rs = [
            "pending"=>$data->where('status',UserWalletClearList::CLEAR_STATUS_PENDING)->count(),
            "count"=>[
                "today" => $data->whereBetween('created_at', $this->today)->count(),
                "yesterday" => $data->whereBetween('created_at', $this->yesterday)->count(),
                "week" => $data->whereBetween('created_at', $this->week)->count(),
            ],
            "amount" => [
                "today" => $data->whereBetween('created_at', $this->today)->sum('amount'),
                "yesterday" => $data->whereBetween('created_at', $this->yesterday)->sum('amount'),
                "week" => $data->whereBetween('created_at', $this->week)->sum('amount'),
            ],
        ];
        return $this->jsonSuccessResponse($rs);
    }

    public function withdraw_static()
    {
        $data = new UserWalletWithdrawCashList();
        $rs = [
            "pending"=>[
                "count"=>$data->where('status',UserWalletWithdrawCashList::CASH_STATUS_PENDING)->count(),
                "amount"=>$data->where('status',UserWalletWithdrawCashList::CASH_STATUS_PENDING)->sum('amount'),
            ]
        ];
        return $this->jsonSuccessResponse($rs);
    }

    public function refund_static()
    {
        $data = new UserWalletRefundList();
        $rs = [
            "pending"=>[
                "count"=>$data->where('status',UserWalletRefundList::RECORD_STATUS_PENDING)->count(),
                "amount"=>$data->where('status',UserWalletRefundList::RECORD_STATUS_PENDING)->sum('amount'),
            ],
            "processing"=>[
                "count"=>$data->where('status',UserWalletRefundList::RECORD_STATUS_PROCESSING)->count(),
                "amount"=>$data->where('status',UserWalletRefundList::RECORD_STATUS_PROCESSING)->sum('amount'),
            ]
        ];
        return $this->jsonSuccessResponse($rs);
    }
}
