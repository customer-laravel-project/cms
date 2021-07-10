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
    $this->post('article_type/create', 'ArticleTypeController@create')->name("article_type.create");
    $this->get('article_type/edit/{id}', 'ArticleTypeController@edit')->name("article_type.edit");
    $this->post('article_type/update/{id}', 'ArticleTypeController@update')->name("article_type.update");
    $this->post('article_type/del/{id}', 'ArticleTypeController@del')->name("article_type.del");
    $this->post('article_type/recover/{id}', 'ArticleTypeController@recover')->name("article_type.recover");
});

