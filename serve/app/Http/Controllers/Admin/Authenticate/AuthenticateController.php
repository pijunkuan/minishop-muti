<?php

namespace App\Http\Controllers\Admin\Authenticate;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Authenticate\Admin\AdminAuthenticateCollection;
use App\Http\Resources\Shop\Authenticate\Admin\AdminAuthenticateResource;
use App\Models\Shop;
use App\Models\ShopAuthenticate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthenticateController extends Controller
{
    public function index(Request $request)
    {
        $lists = new ShopAuthenticate();

        if ($request->has('status')) $lists = $lists->where('status', $request->get('status'));
        if ($request->has('mobile')) {
            $lists = $lists->where('mobile', $request->get('mobile'));
        }
        if ($request->has('shop_name')) {
            $shop = Shop::where('shop_name', $request->get('shop_name'))->first();
            if ($shop) {
                $lists = $lists->where('shop_id', $shop['id']);
            }
        }
        $lists = $lists->orderBy('created_at', 'desc')->paginate($request->get('pageSize'));
        return $this->jsonSuccessResponse(new AdminAuthenticateCollection($lists));
    }

    public function update(Request $request)
    {
        $authenticate = ShopAuthenticate::findOrFail($request->route()->parameter('authenticate'));
        if($authenticate['status'] != ShopAuthenticate::AUTH_STATUS_PENDING) return $this->jsonErrorResponse(422,"该状态无法认证");
        $validator = Validator::make($request->all(),[
            "status"=>["required",Rule::in([ShopAuthenticate::AUTH_STATUS_SUCCESS,ShopAuthenticate::AUTH_STATUS_FAILED])],
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse(422,$validator->errors()->first());
        } else {
            $data = $validator->validate();
            $authenticate->update($data);
            $authenticate->refresh();
        }
        return $this->jsonSuccessResponse(new AdminAuthenticateResource($authenticate));
    }
}
