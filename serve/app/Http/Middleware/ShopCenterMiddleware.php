<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShopCenterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($user = auth('users')->user()) {
            if ($request->account) {
                $shop = $user->shops()->where('shop_url', $request->account)->first();
                if ($shop) {
                    if($shop->status == Shop::SHOP_STATUS_STOP){
                        throw (new HttpResponseException(response()->json([
                            'code' => 422,
                            "message" => "已停用",
                            "body" => null,
                        ], 422)));
                    }
                    $request->attributes->add(['ori_shop' => $shop]);
                    return $next($request);
                }
            }
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => "无商城",
                "body" => null,
            ], 422)));

        } else {
            throw (new HttpResponseException(response()->json([
                'code' => 422,
                "message" => "用户未认证",
                "body" => null,
            ], 422)));
        }

    }
}
