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
Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function () {
    $this->get('article_type', 'ArticleTypeController@index')->name('article_type.index');
    $this->get('article_type/add', 'ArticleTypeController@add');
    $this->post('article_type/create', 'ArticleTypeController@create')->name("article.create");
    $this->get('article_type/edit/{id}', 'ArticleTypeController@edit');
    $this->post('article_type/update/{id}', 'ArticleTypeController@update')->name("article.update");
});

