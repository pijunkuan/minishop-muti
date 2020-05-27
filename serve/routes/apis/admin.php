<?php

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('login', "AdminController@login");
    Route::post('refresh', "AdminController@refresh");
    Route::get('logout', "AdminController@logout");
    Route::get('me', "AdminController@me");
    Route::put('me', "AdminController@update");

    Route::middleware('auth:admins')->group(function(){
        Route::get('wallet',"Wallet\WalletController@index");
        Route::get('customer',"Customer\CustomerController@index");
        Route::get('order',"Order\OrderController@index");
        Route::get('income',"Income\IncomeController@index");

        Route::apiResource('withdraw',"Withdraw\WithdrawController")->only(["index","update"]);
        Route::apiResource('clear',"ClearList\ClearListController")->only(['index','update']);

        Route::get('template/{template}/variant',"Template\TemplateController@variant_index");
        Route::post('template/{template}/variant',"Template\TemplateController@variant_store");
        Route::put('template/{template}/variant/{variant}',"Template\TemplateController@variant_update");
        Route::delete('template/{template}/variant/{variant}',"Template\TemplateController@variant_destroy");
        Route::apiResource("template","Template\TemplateController")->only(['index','update']);


        Route::get('level/{level}/variant',"Level\LevelController@variant_index");
        Route::post('level/{level}/variant',"Level\LevelController@variant_store");
        Route::put('level/{level}/variant/{variant}',"Level\LevelController@variant_update");
        Route::delete('level/{level}/variant/{variant}',"Level\LevelController@variant_destroy");
        Route::apiResource("level","Level\LevelController")->only(['index','update']);

        Route::get('sms/sign',"Sms\SmsController@sign_index");
        Route::put('sms/sign/{sign}',"Sms\SmsController@sign_update");
        Route::get('sms/{sms}/variant',"Sms\SmsController@variant_index");
        Route::post('sms/{sms}/variant',"Sms\SmsController@variant_store");
        Route::put('sms/{sms}/variant/{variant}',"Sms\SmsController@variant_update");
        Route::delete('sms/{sms}/variant/{variant}',"Sms\SmsController@variant_destroy");
        Route::apiResource('sms',"Sms\SmsController")->only(['index',"update"]);

        Route::apiResource('image','Image\ImageController')->only(['index','store','destroy']);

        Route::get('sys_template','SysTemplate\SysTemplateController@show');
        Route::put('sys_template','SysTemplate\SysTemplateController@update');

    });

});
