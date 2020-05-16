<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group([
    "domain"=>"userback.minishop.test",
],function(){
    require __DIR__ . "/webs/account.php";
});

Route::group([
    "domain"=>"account.min-eshop.vip",
],function(){
    require __DIR__ . "/webs/account.php";
});

Route::group([
    "domain"=>"{account}.min-eshop.vip",
    "middleware"=>["shop"]
],function(){
    require __DIR__ . "/webs/shop.php";
});

Route::group([
    "domain"=>"{account}.minishop.test",
    "middleware"=>["shop"]
],function(){
    require __DIR__ . "/webs/shop.php";
});



