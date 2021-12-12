<?php

namespace App\Http\Controllers;


use App\Exceptions\AdminCustomerException;
use App\Modules\Admin\Models\Admin;
use App\Tools\Tree;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BaseController extends Controller
{
    /**@var $admin Auth::user() */
    protected $admin;
    protected $title;
    protected $description;
    protected $menu;

    public function __construct()
    {
        //dd(Auth::guard("admin"));
        //$this->middleware('auth.admin');
        $this->header();
        $this->common();
    }

    public function setAdmin()
    {
        $this->admin = Auth::guard("admin")->user();
        $this->checkPerm();
    }

    protected function header()
    {
        $this->admin = Auth::guard('admin')->user();
        View()->composer('partials/header', function ($view) {
            $view->with(['admin' => $this->admin]);
        });
    }

    protected function common()
    {

        //dd(Tree::getTree());
        View()->composer('layouts/app_back', function ($view) {
            $view->with(['title' => $this->title]);
            $view->with(['description' => $this->description]);
            $view->with(['item' => $this->menu]);
        });
    }

    protected function menu()
    {
        $res = Admin::query()->with('role')->get()->toArray();
        $role = $res[0]['role']??[];
        $menu = [];
        foreach ($role as $value){
            foreach ($value['menu'] as $mu){
                $menu[] = $mu;
            }
        }
        $this->menu=$menu;
        return Tree::generator($menu,0);
    }

    protected function checkPerm(){
        $this->menu();
        $menu = $this->menu;
        $requestUri = app('request')->server('REQUEST_URI');
        $tmp = explode('/',$requestUri);
        if(is_numeric(end($tmp))){
            array_pop($tmp);
        }
        $requestUri = implode('/',$tmp);
        $flag=false;
        foreach ($menu as $m){
            if($m['uri']==$requestUri){
                $flag=true;
            }
        }
        if (!$flag){
            throw  new AdminCustomerException("403",403);
        }
    }

}
