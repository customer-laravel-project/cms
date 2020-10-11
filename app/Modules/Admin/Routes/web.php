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
//\Illuminate\Support\Facades\Auth::routes();

Route::group(['prefix'=>'auth','namespace'=>'Auth'],function () {

    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
    $this->post('register', 'RegisterController@register');
    $this->post('logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix'=>'admin'],function () {

    $this->get('home', 'DashboardController@index')->name('admin.home');
    $this->get('menu', 'MenuController@index')->name('admin.menu');
    $this->get('menu/add', 'MenuController@add')->name('admin.menu_add');
    $this->post('menu/store', 'MenuController@store')->name('admin.menu_store');
    $this->get('menu/edit/{id}', 'MenuController@edit')->name('admin.menu_edit');
    $this->post('menu/update/{id}', 'MenuController@update')->name('admin.menu_update');

    $this->get('role', 'RoleController@index')->name('admin.role');
    $this->get('role/add', 'RoleController@add')->name('admin.role_add');
    $this->post('role/store', 'RoleController@store')->name('admin.role_store');
    $this->get('role/edit/{id}', 'RoleController@edit')->name('admin.role_edit');
    $this->post('role/update/{id}', 'RoleController@update')->name('admin.role_update');

});

