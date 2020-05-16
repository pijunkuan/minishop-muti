<?php

Route::group([
    "prefix"=>"center",
],function(){
    Route::get('',"Web\WebController@center");
});
