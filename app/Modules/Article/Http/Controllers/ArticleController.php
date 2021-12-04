<?php

namespace App\Modules\Article\Http\Controllers;

use App\Modules\Admin\Models\Admin;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleContent;
use App\Modules\Article\Request\ArticleRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
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
        $articleId = $list->pluck("id")->toArray();
        $content = ArticleContent::query()->whereIn("article_id", $articleId)->pluck("content", "article_id");
        foreach ($list as $value) {
            $value['operator_name'] = $admin[$value['creator']] ?? '';
            $value['last_operator_name'] = $admin[$value['last_operator']] ?? '';
            $value['audit_name'] = $admin[$value['audit']] ?? '';
            $value['type_name'] = $types[$value['article_type']];
            $value['content'] = $content[$value['id']] ?? '';
        }
        return view('article::article/index', ['article' => $list]);
    }

    public function add()
    {
        $type = ArticleType::query()->where('status', 1)->get();
        return view("article::article/add", ['types' => $type]);
    }

    /**
     * @param ArticleRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function create(ArticleRequest $request)
    {
        $data = $request->only(['name', 'content', 'article_type', 'author']);
        $admin = Auth::guard('admin')->user();
        $data['creator'] = $admin->id;
        $data['last_operator'] = $admin->id;
        try {
            DB::beginTransaction();
            $content = $data['content'];
            unset($data['content']);
            $articleId = Article::query()->create($data);
            ArticleContent::query()->create(['article_id' => $articleId->id, 'content' => $content]);
            DB::commit();
            return redirect()->intended(route("article.index", [], false))->with(['message' => '文章创建成功']);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                "name" => "创建文章失败",
            ]);
        }
    }

    /**
     * @param Request $request
     * 上传文件到本地服务器
     * @return JsonResponse
     * @throws ValidationException
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'image'
        ]);
        $imageDir = "editor_image";
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $filename = (microtime(true) * 10000) . '.' . $ext;
        if (!is_dir($imageDir)) {
            File::makeDirectory($imageDir, 0755, true);
        }
        $r = $file->storeAs($imageDir, $filename, 'public');
        $url = config("filesystems.disks.public.url") . $imageDir . DIRECTORY_SEPARATOR . $filename;
        return response()->json(['code' => 0, "url" => $url]);

    }

    /**
     * @param Request $request
     * 删除本地服务器的图片，可能会存在删除失败的情况，暂不考虑
     */
    public function deleteImg(Request $request)
    {
        $img = $request->get('img');
        $info = parse_url($img);
        $host = $info['host'];
        $envUrl = parse_url(env('APP_URL'));
        $envHost = $envUrl['host'];
        $path = public_path($info['path']);
        if ($envHost == $host) {
            @unlink($path);
        }
        response()->json(['code' => 0, 'msg' => 'success']);
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
