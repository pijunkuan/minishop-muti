<?php
Route::group([
    'prefix' => "front",
    "middleware"=>"shop",
    "namespace" => "Front"
], function () {
    Route::prefix('customer')->namespace('Customer')->group(function () {
        Route::post('login', "CustomerController@login");
        Route::get('refresh', 'CustomerController@refresh');
        Route::get('logout', 'CustomerController@logout');
        Route::post('', 'CustomerController@register');
        Route::put('', 'CustomerController@update');
        Route::get('', 'CustomerController@me');
    });
    Route::apiResource('product', 'Product\ProductController')->only(['index', 'show']);
    Route::get('category', 'Category\CategoryController@index');
    Route::get('template', "Template\TemplateController@get");

    Route::middleware('auth:customers')->group(function () {
        Route::prefix('cart')->namespace('Cart')->group(function () {
            Route::post('cache', 'CartController@cache_in');
            Route::get('cache/{key}', 'CartController@cache_out');
            Route::get('', 'CartController@index');
            Route::post('', 'CartController@store');
            Route::put('', 'CartController@update');
            Route::delete('{variant_id}', 'CartController@destroy');
        });
        Route::apiResource('address', 'Address\AddressController')->except(['show']);

    });
});


