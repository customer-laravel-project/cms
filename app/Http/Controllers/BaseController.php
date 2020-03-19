<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class BaseController extends Controller{
    public function __construct()
    {
        //dd(Auth::guard('auth')->user());
    }
}