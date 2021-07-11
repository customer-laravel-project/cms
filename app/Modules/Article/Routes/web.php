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
    $this->get('article', 'ArticleController@index')->name('article.index');
    $this->get('article/add', 'ArticleController@add')->name('article.add');
    $this->post('article/create', 'ArticleController@create')->name("article.create");
    $this->get('article/edit/{id}', 'ArticleController@edit')->name("article.edit");
    $this->post('article/update/{id}', 'ArticleController@update')->name("article.update");
    $this->post('article/del/{id}', 'ArticleController@del')->name("article.del");
    $this->post('article/recover/{id}', 'ArticleController@recover')->name("article.recover");
    $this->post('article/upload', 'ArticleController@upload');
    $this->post('article/deleteImg', 'ArticleController@deleteImg');

});
