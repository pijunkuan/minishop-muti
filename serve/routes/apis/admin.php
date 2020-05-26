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

    });

});
