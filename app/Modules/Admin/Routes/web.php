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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        dd('This is the Admin module index page. Build something great!');
    });
});

Route::group(['prefix'=>'auth'],function () {

    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
    $this->post('register', 'RegisterController@register');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
});

