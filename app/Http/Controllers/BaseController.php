<?php

namespace App\Http\Controllers;


use App\Tools\Tree;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    /**@var $admin Auth::user() */
    protected $admin;
    protected $title;
    protected $description;

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
            $view->with(['item' => Tree::getTree()]);
        });
    }


    protected function menu()
    {

    }

}
