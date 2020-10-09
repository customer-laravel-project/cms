<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
    Route::get('/article_type', 'ArticleTypeController@index');
});
//Route::resource('admin/article_type','ArticleTypeController')->middleware('auth:admin');
