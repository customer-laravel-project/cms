<?php

namespace App\Modules\Articletype\Http\Controllers;

use App\Modules\Articletype\Request\ArticleTypeRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Modules\ArticleType\Models\ArticleType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ArticleTypeController extends BaseController
{

    public function __construct()
    {
        $this->title = "Dashboard";
        parent::__construct();

    }

    public function index()
    {
        $this->setAdmin();
        return view('articletype::article_type/index', ['menu' => ArticleType::all()]);
    }

    public function add()
    {
        return view("articletype::article_type/add");
    }

    /**
     * @param ArticleTypeRequest $request
     * @return RedirectResponse
     */
    public function create(ArticleTypeRequest $request)
    {
        $admin = Auth::guard('admin')->user();
        $data = $request->only(['name', 'abbr', 'sorts']);
        $data['creator'] = $admin->id;
        $data['last_operator'] = $admin->id;
        ArticleType::query()->create($data);
        return redirect()->intended(route("article_type.index", [], false))->with(['message' => '类型创建成功']);
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
