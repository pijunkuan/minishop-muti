<?php
Route::get("","Web\WebController@account");
Route::get("login","Web\WebController@account");
Route::get("register","Web\WebController@account");
Route::get("forget","Web\WebController@account");
Route::prefix('shops')->group(function(){
    Route::get("","Web\WebController@account");
    Route::get("create","Web\WebController@account");
});
Route::get("purchase","Web\WebController@account");
Route::get("wallet","Web\WebController@account");
Route::get("user","Web\WebController@account");
Route::get('pay/{payment_no}',"Shop\Shop\PayController@pay");

