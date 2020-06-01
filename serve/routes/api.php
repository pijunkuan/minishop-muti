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

//Route::post('paytest/{no}',"Front\Pay\PayController@test");

require_once __DIR__ . "/apis/shop.php";
require_once __DIR__ . "/apis/admin.php";

Route::get('common/home_template',"Controller@home_template");
Route::get('common/home_config',"Controller@home_config");

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








