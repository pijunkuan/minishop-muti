<?php
Route::get("","Web\WebController@account");
Route::get("login","Web\WebController@account");
Route::get("register","Web\WebController@account");
Route::get("shops","Web\WebController@account");
Route::get("shops/{all}","Web\WebController@account");
Route::get("purchase","Web\WebController@account");
Route::get("user","Web\WebController@account");
Route::get('pay/{payment_no}',"Shop\Shop\PayController@pay");

