<?php
Route::group([
    'prefix' => "front",
    "middleware" => "shop",
    "namespace" => "Front"
], function () {
    Route::prefix('customer')->namespace('Customer')->group(function () {
        Route::post('login', "CustomerController@login");
        Route::post('forget','CustomerController@forget');
        Route::get('refresh', 'CustomerController@refresh');
        Route::get('logout', 'CustomerController@logout');
        Route::post('', 'CustomerController@register');
        Route::put('', 'CustomerController@update');
        Route::get('', 'CustomerController@me');
    });
    Route::apiResource('product', 'Product\ProductController')->only(['index', 'show']);
    Route::get('category', 'Category\CategoryController@index');
    Route::get('template', "Template\TemplateController@get");
    Route::get('payment_methods', "Payment\PaymentController@methods");
    Route::post('verification', "Sms\SmsController@verification");

    Route::middleware('auth:customers')->group(function () {
        Route::prefix('pay/{no}')->group(function () {
            Route::get('wallet', "Pay\PayController@wallet");
        });
        Route::prefix('cart')->namespace('Cart')->group(function () {
            Route::post('cache', 'CartController@cache_in');
            Route::get('cache/{key}', 'CartController@cache_out');
            Route::get('', 'CartController@index');
            Route::post('', 'CartController@store');
            Route::put('', 'CartController@update');
            Route::delete('{variant_id}', 'CartController@destroy');
        });
        Route::apiResource('address', 'Address\AddressController')->except(['show']);
        Route::prefix('wallet')->namespace('Wallet')->group(function () {
            Route::get('', 'WalletController@index');
            Route::get('balance', 'WalletController@balance');
        });
        Route::post('order/calc', 'Order\OrderController@calc');
        Route::post('order/{order}/pay/{payment}', "Order\OrderController@pay_create")->name('order.pay');
        Route::apiResource('order', "Order\OrderController")->except(['destroy']);
    });
});


