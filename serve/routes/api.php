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

//Route::prefix('admin')->namespace('Admin')->group(function () {
//    Route::post('login', "AdminController@login");
//    Route::post('refresh', "AdminController@refresh");
//    Route::get('logout', "AdminController@logout");
//    Route::get('me', "AdminController@me");
//    Route::put('me', "AdminController@update");
//});






