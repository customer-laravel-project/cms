<?php
namespace App\Modules\Articletype\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\BaseController;
use App\Modules\ArticleType\Models\ArticleType;

class ArticleTypeController extends BaseController{

    public function index()
    {
       dd(Auth::user()->toArray());
        //return View('articletype::article_index');
        dd(ArticleType::all());
        dd('article type controller');
    }

    public function create(Type $var = null)
    {
        # code...
    }

    public function edit(int $id)
    {
        # code...
    }

    public function show(int $id)
    {
        # code...
    }


}
