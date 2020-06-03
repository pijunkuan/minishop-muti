<?php

Route::get("","Web\WebController@web");
Route::get('checksuc',"Web\WebController@web");
Route::get("order/pay/{no}","Front\Pay\PayController@pay")->name('front.order.pay');
Route::get('redirect/{all}',"Web\WebController@web");
Route::get('404',"Web\WebController@web");
Route::get('login',"Web\WebController@web");
Route::get('register',"Web\WebController@web");
Route::get('forget',"Web\WebController@web");
Route::get('search',"Web\WebController@web");
Route::get('products',"Web\WebController@web");
Route::get('menu',"Web\WebController@web");
Route::get('types',"Web\WebController@web");
Route::get('product/{all}',"Web\WebController@web");
Route::get('cart',"Web\WebController@web");
Route::get('checkout',"Web\WebController@web");
Route::get('checkpay',"Web\WebController@web");
Route::get('checksuc',"Web\WebController@web");
Route::prefix('user')->group(function(){
    Route::get('home',"Web\WebController@web");
    Route::get('wallet',"Web\WebController@web");
    Route::get('order',"Web\WebController@web");
    Route::get('order/detail',"Web\WebController@web");
    Route::get('address',"Web\WebController@web");
});

