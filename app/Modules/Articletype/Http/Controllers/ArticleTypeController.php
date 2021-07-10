<?php

namespace App\Modules\Articletype\Http\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Articletype\Request\ArticleTypeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;
use App\Modules\ArticleType\Models\ArticleType;
use Illuminate\Support\Facades\Auth;

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
        $list = ArticleType::query()->orderBy("id", "desc")->paginate(1);
        $creatorId = $list->pluck("creator")->toArray();
        $lastOperatorId = $list->pluck("last_operator")->toArray();
        $adminId = array_unique(array_merge($creatorId, $lastOperatorId));
        $admin = Admin::query()->whereIn('id', $adminId)->get()->pluck("name", 'id');
        foreach ($list as $value) {
            $value['operator_name'] = $admin[$value['creator']] ?? '';
            $value['last_operator_name'] = $admin[$value['last_operator']] ?? '';
        }
        return view('articletype::article_type/index', ['type' => $list]);
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
