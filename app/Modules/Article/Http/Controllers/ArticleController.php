<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Article\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\BaseController;
use App\Modules\ArticleType\Models\ArticleType;

class ArticleController extends BaseController
{

    public function __construct()
    {
        $this->title = "Dashboard";
        parent::__construct();
    }

    public function index()
    {
        $this->setAdmin();
        $list = Article::all();
        return View('admin::article_type/index', ['list' => $list]);
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
