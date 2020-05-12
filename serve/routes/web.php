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

Route::domain('userback.minishop.test')->get('',function(){
    echo "userback";
});

Route::domain('{account}.minishop.test')->middleware('shop')->get('',function(){
    $css = \Illuminate\Support\Facades\Storage::files('css');
    $js = \Illuminate\Support\Facades\Storage::files('js');
    return view('welcome',[
        "csses"=>$css,
        "jses"=>$js
    ]);
});

Route::get('{id}', function ($id) {
    if($id == 0){
        $css = \Illuminate\Support\Facades\Storage::files('css');
        $js = \Illuminate\Support\Facades\Storage::files('js');
        return view('welcome',[
            "csses"=>$css,
            "jses"=>$js
        ]);
    }else{
        abort(404,"商店不存在");
    }

});
Route::get('types',function(){
    $css = \Illuminate\Support\Facades\Storage::files('css');
    $js = \Illuminate\Support\Facades\Storage::files('js');
    return view('welcome',[
        "csses"=>$css,
        "jses"=>$js
    ]);
});
