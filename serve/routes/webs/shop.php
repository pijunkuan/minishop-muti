<?php

Route::get("","Web\WebController@web");

Route::get("pay/order/{no}","Front\Pay\PayController@pay");

