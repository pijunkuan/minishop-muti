<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShopMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shop = Shop::where('shop_url',$request->account)->first();
        if($shop){
            $customer = auth('customers')->user();
            if($customer){
                if($customer->shop['id'] != $shop['id']){
                    throw (new HttpResponseException(response()->json([
                        'code' => 422,
                        "message" => "此商城无此用户",
                        "body" => null,
                    ], 422)));
                }
            }
            $request->attributes->add(['ori_shop' => $shop]);
            return $next($request);
        }else{
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => "无商城",
                "body" => null,
            ], 422)));
        }
    }
}
