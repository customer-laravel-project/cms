<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Admin\Models\Admin;
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
        $list = Article::query()->orderBy("id", "desc")->paginate(1);
        $creatorId = $list->pluck("creator")->toArray();
        $auditId = $list->pluck('audit')->toArray();
        $lastOperatorId = $list->pluck("last_operator")->toArray();
        $typeId = $list->pluck('article_type')->toArray();
        $types = ArticleType::query()->whereIn('id', $typeId)->pluck("name", "id");
        $adminId = array_unique(array_merge($creatorId, $lastOperatorId, $auditId));
        $admin = Admin::query()->whereIn('id', $adminId)->get()->pluck("name", 'id');
        foreach ($list as $value) {
            $value['operator_name'] = $admin[$value['creator']] ?? '';
            $value['last_operator_name'] = $admin[$value['last_operator']] ?? '';
            $value['audit_name'] = $admin[$value['audit']] ?? '';
            $value['type_name'] = $types[$value['article_type']];
        }
        return view('article::article/index', ['article' => $list]);
    }

    public function add()
    {
        return view("article::article/add");
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
        $type = ArticleType::query()->findOrFail($id);
        return view("articletype::article_type/edit", ['type' => $type]);
    }

    public function update(int $id, ArticleTypeRequest $request)
    {
        $data = $request->only(['name', 'sorts', 'abbr']);
        $data['last_operator'] = Auth::guard('admin')->user()->id;
        ArticleType::query()->where('id', $id)->update($data);
        return redirect()->intended(route("article_type.index", [], false))->with(['message' => '类型修改成功']);
    }

    public function del(int $id)
    {
        ArticleType::query()->where('id', $id)->update(['status' => 2]);
        return response()->json(['code' => 0, 'message' => 'success']);
        return redirect()->intended(route("article_type.index", [], false))->with(['message' => '类型删除成功']);

    }

    public function recover(int $id)
    {
        ArticleType::query()->where('id', $id)->update(['status' => 1]);
        return response()->json(['code' => 0, 'message' => 'success']);

        return redirect()->intended(route("article_type.index", [], false))->with(['message' => '类型恢复成功']);

    }

    public function show(int $id)
    {
        # code...
    }


}
