<?php

Route::namespace('Shop')->group(function () {
    Route::prefix('user')->namespace('User')->group(function () {
        Route::post('register', 'UserController@register');
        Route::post('login', 'UserController@login');
        Route::post('forget', 'UserController@forget');
        Route::put('edit', "UserController@edit");
        Route::get('refresh', "UserController@refresh");
        Route::get('info', 'UserController@info');
        Route::get('logout',"UserController@logout");
    });
    Route::prefix('shop')->namespace('Shop')->middleware('auth:users')->group(function () {
        Route::get('', 'ShopController@index');
        Route::get('{shop}', 'ShopController@show');
        Route::prefix('order')->group(function () {
            Route::post('', 'OrderController@store');
            Route::get('list', 'OrderController@index');
            Route::get('{order_no}', 'OrderController@show');
        });
        Route::prefix('sys')->group(function () {
            Route::get('payment_method', 'SysController@payment');
            Route::get('level', 'SysController@level');
            Route::get('template', 'SysController@template_list');
        });
    });

    Route::prefix('wallet')->namespace('User')->middleware('auth:users')->group(function(){
        Route::get('account',"WalletController@show");
        Route::post('account',"WalletController@store");
    });

    Route::prefix('withdraw')->namespace('User')->middleware('auth:users')->group(function(){
        Route::get('way_list',"WithdrawController@way_list");
        Route::get('account',"WithdrawController@account_index");
        Route::post('account',"WithdrawController@account_store");
    });
});

Route::prefix('sms')->namespace("Sms")->group(function(){
    Route::post('verification',"SmsController@verification_code");
});
