<?php

namespace App\Http\Controllers\Apps\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\Authenticate\AuthenticateResource;
use App\Http\Resources\Shop\ShopResource;
use App\Models\Shop;
use App\Models\ShopAuthenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ShopController extends Controller
{
    public function info(Request $request)
    {
        $shop = $request->get('ori_shop');
        return $this->jsonSuccessResponse(new ShopResource($shop));
    }

    public function update(Request $request)
    {
        $shop = $request->get('ori_shop');
        if ($request->has('shop_name')) $shop->shop_name = $request->get('shop_name');
        if ($request->has('shop_url')) {
            if ($shop->level->level['domain_edit']) {
                if (Shop::where('id', "<>", $shop['id'])->where('shop_url', $request->get('shop_url'))->first()) {
                    return $this->jsonErrorResponse(401, "商铺链接已存在，不可重复");
                }
                $shop->shop_url = $request->get('shop_url');
            }
        }
        if ($request->has('status')) {
            if (!in_array($request->get('status'), [
                Shop::SHOP_STATUS_ACTIVE,
                Shop::SHOP_STATUS_PENDING,
            ])) {
                return $this->jsonErrorResponse(401, '非法status代码');
            }
            $shop->status = $request->get('status');
        }
        if ($request->has('active')) {
            $shop->status = $request->get('status') ? true : false;
        }
        if ($request->get('auto_close_in')) {
            $shop->auto_close_in = $request->get('auto_close_in');
        }
        if ($request->get('auto_receive_in')) {
            $shop->auto_receive_in = $request->get('auto_receive_in');
        }
        $shop->save();
        $shop->refresh();
        return $this->jsonSuccessResponse(new ShopResource($shop));
    }

    public function authenticate_show(Request $request)
    {
        $shop = $request->get('ori_shop');
        if ($shop->authenticate) return $this->jsonSuccessResponse(new AuthenticateResource($shop->authenticate));
        else return $this->jsonSuccessResponse(null,'暂无认证');
    }

    public function authenticate_store(Request $request)
    {
        $shop = $request->get('ori_shop');
        $validator = Validator::make($request->all(), [
            'type' => ["required", Rule::in([ShopAuthenticate::AUTH_TYPE_PERSON, ShopAuthenticate::AUTH_TYPE_COMPANY])],
            "company_name"=>"nullable",
            'name' => "required",
            'id_no' => "required",
            'address' => "required",
            'mobile' => "required",
            'telephone' => "nullable",
            'images' => "required|array",
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            if ($shop->authenticate) $shop->authenticate->delete();
            $authenticate = $shop->authenticate()->create($data);
            $authenticate->refresh();
        }
        return $this->jsonSuccessResponse(new AuthenticateResource($authenticate));
    }

    public function authenticate_update(Request $request)
    {
        $shop = $request->get('ori_shop');
        if ($shop->authenticate['status'] == ShopAuthenticate::AUTH_STATUS_SUCCESS) return $this->jsonErrorResponse(422, '认证成功的资料不允许修改');
        $validator = Validator::make($request->all(), [
            "company_name"=>"nullable",
            'name' => "nullable",
            'id_no' => "nullable",
            'address' => "nullable",
            'mobile' => "nullable",
            'telephone' => "nullable",
            'images' => "nullable|array",
        ]);
        if ($validator->fails()) {
            return $this->jsonErrorResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            $shop->authenticate->update($data);
            $shop->authenticate->refresh();
        }
        return $this->jsonSuccessResponse(new AuthenticateResource($shop->authenticate));
    }
}
