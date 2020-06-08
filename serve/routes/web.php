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

Route::post('shop/pay/confirm', "Shop\Shop\PayController@confirm");
Route::post('front/pay/confirm', "Front\Pay\PayController@confirm");
Route::get('front/pay/wxpay/{no}', "Front\Pay\PayController@pay");
Route::get('{filename}','Controller@testfile');


Route::group(["domain" => "back-admin." . env('SHOP_HOST'),], function () {
    require __DIR__ . "/webs/admin.php";
});

Route::group(["domain" => "www." . env('SHOP_HOST'),], function () {
    require __DIR__ . "/webs/home.php";
});

Route::group(["domain" => "account." . env('SHOP_HOST'),], function () {
    require __DIR__ . "/webs/account.php";
});

Route::group(["domain" => "{account}." . env('SHOP_HOST'), "middleware" => ["shop"]], function () {
    require __DIR__ . "/webs/center.php";
    require __DIR__ . "/webs/shop.php";
});





