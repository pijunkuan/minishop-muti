<?php

Route::group(["prefix" => "shop", "namespace" => "Shop"], function () {
    Route::get('info', "ShopController@info");
    Route::put('update',"ShopController@update");

    Route::group(['prefix'=>"payment"],function(){
        Route::get('sys_payment','PaymentController@sys_index');
    });

    Route::group(['prefix'=>"template"],function(){
        Route::get('','TemplateController@index');
        Route::get('cloud','TemplateController@cloud');
        Route::get('{template}','TemplateController@show');
        Route::put('{template}/active','TemplateController@active');
        Route::put('{template}','TemplateController@update');

    });
});

Route::apiResource('product', 'Product\ProductController');
Route::apiResource('category', 'Category\CategoryController')->except(['show']);
Route::apiResource('image', "Image\ImageController")->only(['store', 'destroy', 'index']);

