<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
require_once __DIR__ . "/apis/shop.php";

Route::group([
    "domain" => "{account}.minishop.test",
], function () {
    require __DIR__ . "/apis/center.php";
    require __DIR__ . "/apis/front.php";
});
Route::group([
    "domain" => "{account}.min-eshop.vip",
], function () {
    require __DIR__ . "/apis/center.php";
    require __DIR__ . "/apis/front.php";

});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('login', "AdminController@login");
    Route::post('refresh', "AdminController@refresh");
    Route::get('logout', "AdminController@logout");
    Route::get('me', "AdminController@me");
    Route::put('me', "AdminController@update");
});

Route::prefix('pay/{no}')->namespace('Pay')->group(function () {
    Route::get('wallet', "PayController@wallet")->middleware('auth:customers');
});

Route::middleware('auth:customers')->group(function () {
    Route::post('order/calc', 'Order\OrderController@calc');
    Route::post('order/{order}/pay/{payment}', "Order\OrderController@pay_create")->name('order.pay');
    Route::apiResource('order', "Order\OrderController")->except(['destroy']);
});

Route::middleware('auth:admins')->prefix("admin")->group(function () {
    Route::get('dashboard/{type}', "Dashboard\AdminDashboardController@dashboard_static");
    Route::prefix('order')->namespace('Order')->group(function () {
        Route::get('', 'AdminOrderController@index');
        Route::put('status/{order}', "AdminOrderController@status");
        Route::put('{order}', "AdminOrderController@update");
        Route::get('{order}/shipment', 'AdminOrderShipmentController@index');
        Route::post('{order}/shipment', 'AdminOrderShipmentController@store');
        Route::get('{order}', "AdminOrderController@show");
    });


});



