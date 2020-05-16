<?php

Route::get("","Web\WebController@account");
Route::any("login","Web\WebController@account");
