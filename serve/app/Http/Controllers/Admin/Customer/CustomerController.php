<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\User\UserListCollection;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $users = new User();
        if($request->get('mobile')) $users = $users->where('mobile',$request->get('mobile'));
        $users = $users->orderBy('created_at','desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new UserListCollection($users));
    }
}
