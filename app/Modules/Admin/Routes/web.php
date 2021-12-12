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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {

    $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $this->post('login', 'LoginController@login');
    $this->get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
    $this->post('register', 'RegisterController@register');
    $this->get('logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'admin', "middleware" => 'auth.admin'], function () {

    $this->get('admin',"AdminController@index")->name('admin.admin_index');//管理员列表
    $this->get('admin/edit/{id}',"AdminController@edit")->name('admin.admin_edit');//编辑管理员
    $this->get('admin/set_role/{id}',"AdminController@setRole")->name('admin.set_role');//管理员设置权限
    $this->get('home', 'DashboardController@index')->name('admin.home');//admin home
    $this->get('menu', 'MenuController@index')->name('admin.menu');//菜单列表
    $this->get('menu/add', 'MenuController@add')->name('admin.menu_add');//添加菜单
    $this->get('menu/aaa', 'MenuController@test');
    $this->post('menu/store', 'MenuController@store')->name('admin.menu_store');//保存菜单
    $this->get('menu/edit/{id}', 'MenuController@edit')->name('admin.menu_edit');//编辑菜单
    $this->post('menu/update/{id}', 'MenuController@update')->name('admin.menu_update');//更新菜单

    $this->get('role', 'RoleController@index')->name('admin.role');//权限列表
    $this->get('role/add', 'RoleController@add')->name('admin.role_add');//添加权限
    $this->post('role/store', 'RoleController@store')->name('admin.role_store');//保存权限
    $this->get('role/edit/{id}', 'RoleController@edit')->name('admin.role_edit');//编辑权限
    $this->post('role/update/{id}', 'RoleController@update')->name('admin.role_update');//更新权限
    $this->post('role/set_menu/{id}', 'RoleController@setmenu')->name('admin.set_menu');//设置权限菜单

});

