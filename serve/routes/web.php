<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::post('paytest/{no}',"Front\Pay\PayController@test");
Route::get('sms_test', "Controller@test_sms");
//Route::post('order_refund',"Controller@order_refund_test");


Route::post('shop/pay/confirm', "Shop\Shop\PayController@confirm");
Route::post('front/pay/confirm', "Front\Pay\PayController@confirm");
Route::get('front/pay/wxpay/{no}', "Front\Pay\PayController@pay");


Route::group(["domain" => "userback.minishop.test",], function () {
    require __DIR__ . "/webs/account.php";
});
Route::group(["domain" => "{account}.minishop.test", "middleware" => ["shop"]], function () {
    require __DIR__ . "/webs/center.php";
    require __DIR__ . "/webs/shop.php";
});
Route::group(["domain" => "back.minishop.test",], function () {
    require __DIR__ . "/webs/admin.php";
});


Route::group(["domain" => "account." . env('SHOP_HOST'),], function () {
    require __DIR__ . "/webs/account.php";
});

Route::group(["domain" => "{account}." . env('SHOP_HOST'), "middleware" => ["shop"]], function () {
    require __DIR__ . "/webs/center.php";
    require __DIR__ . "/webs/shop.php";
});
Route::group(["domain" => "back." . env('SHOP_HOST'),], function () {
    require __DIR__ . "/webs/admin.php";
});

require __DIR__ . "/webs/home.php";


