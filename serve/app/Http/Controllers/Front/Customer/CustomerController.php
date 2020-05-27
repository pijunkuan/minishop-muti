<?php

namespace App\Http\Controllers\Front\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Edit;
use App\Http\Requests\Customer\Login;
use App\Http\Requests\Customer\Register;
use App\Http\Resources\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customers', ['except' => ['register', 'login','forget']]);
    }

    public function forget(Request $request)
    {
        $shop = $request->get('ori_shop');

        $validator = Validator::make($request->all(),[
            "mobile"=>"required",
            "password"=>"required|min:6|alpha_dash",
            "verification_code"=>"required"
        ]);
        if ($validator->fails()) {
            return $this->jsonSuccessResponse($validator->errors()->first());
        } else {
            $data = $validator->validate();
            $customer = $shop->customers()->where('mobile',$data['mobile'])->firstOrFail();
            $code = Cache::get("FRONT_SMS_CODE{$data['mobile']}");
            if(!$code) return $this->jsonErrorResponse(422,"验证码不存在");
            if($code != $data('verification_code')) return $this->jsonErrorResponse(422,"验证码不正确");
            $customer->password = Hash::make($data['password']);
            $customer->save();
            $customer->refresh();
            return $this->jsonSuccessResponse($this->respondWithToken(auth('customers')->login($customer)));
        }
    }
    public function register(Register $request)
    {

        $shop = $request->get('ori_shop');
        if ($shop->customers()->where('mobile', $request->get('mobile'))->first()) {
            return $this->jsonErrorResponse(422, '该手机号已注册');
        }
        $code = Cache::get("FRONT_SMS_CODE{$request->get('mobile')}");
        if(!$code) return $this->jsonErrorResponse(422,"验证码不存在");
        if($code != $request->get('verification_code')) return $this->jsonErrorResponse(422,"验证码不正确");
        $customer = $shop->customers()->make([
            "mobile" => $request->get('mobile'),
            "password" => Hash::make($request->get('password'))
        ]);
        $customer->save();
        if ($customer) {
            return $this->jsonSuccessResponse($this->respondWithToken(auth('customers')->login($customer)), "注册成功");
        } else {
            return $this->jsonErrorResponse(401, "创建失败");
        }
    }

    public function login(Login $request)
    {

        $shop = $request->get('ori_shop');
        $customer = $shop->customers()->where('mobile', $request->get('mobile'))->first();
        if (!$customer) return $this->jsonErrorResponse(422, '不存在该用户');
        if (!Hash::check($request->get('password'), $customer['password'])) return $this->jsonErrorResponse(422, '密码错误');
        return $this->jsonSuccessResponse($this->respondWithToken(auth('customers')->login($customer)));
    }

    public function update(Edit $request)
    {
        $customer = auth('customers')->user();
        if ($request->get('username')) {
            $shop = $request->get('ori_shop');
            if($shop->customers()->where('id','<>',$customer['id'])->where('username',$request->get('username'))->first())
                return $this->jsonErrorResponse(422,'该用户名已存在');
            $customer->username = $request->get('username');
        }
        if ($request->get('password'))
            $customer->password = Hash::make($request->get('password'));
        $customer->save();
        return $this->jsonSuccessResponse($this->respondWithToken(auth('customers')->refresh()), "更新成功");

    }

    public function me()
    {
        return $this->jsonSuccessResponse(new CustomerResource(auth('customers')->user()));
    }

    public function refresh()
    {
        return $this->jsonSuccessResponse($this->respondWithToken(auth('customers')->refresh()));
    }

    public function logout()
    {
        auth('customers')->logout();
        return $this->jsonSuccessResponse(null, "成功登出");
    }

    public function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('customers')->factory()->getTTL() * 60,
        ];
    }
}
