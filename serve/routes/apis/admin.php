<?php

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('login', "AdminController@login");
    Route::post('refresh', "AdminController@refresh");
    Route::get('logout', "AdminController@logout");
    Route::get('me', "AdminController@me");
    Route::put('me', "AdminController@update");

    Route::middleware('auth:admins')->group(function(){
        Route::apiResource('withdraw',"Withdraw\WithdrawController")->only(["index","update"]);
    });

});
