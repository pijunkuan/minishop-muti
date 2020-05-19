<?php

Route::get("","Web\WebController@web");
Route::get('checksuc',"Web\WebController@web");
Route::get("order/pay/{no}","Front\Pay\PayController@pay")->name('front.order.pay');

