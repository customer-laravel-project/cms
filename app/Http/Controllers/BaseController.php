<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    /**@var $admin Auth::user() */
    protected $admin;
    protected $title;
    protected $description;

    public function __construct()
    {
        $this->middleware('auth.admin');
        $this->admin = Auth::guard('admin')->user();
        $this->header();
        $this->common();
    }

    protected function header()
    {
        View()->composer('partials/header', function ($view) {
            $view->with(['admin' => $this->admin]);
        });
    }

    protected function common()
    {
        View()->composer('layouts/app_back', function ($view) {
           // $view->with(['title' => $this->title]);
            //$view->with(['description' => $this->description]);
        });
    }

}
