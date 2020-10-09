<?php

/**
 * Created User: feng
 * Created Date: 2020/10/9 11:02
 * Current User:feng
 * History User:历史修改者
 * Description:这个文件主要做什么事情
 */
namespace App\Modules\Admin\Http\Controllers;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return  view('admin::home');
    }

}
