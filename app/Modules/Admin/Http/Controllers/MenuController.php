<?php
/**
 * Created User: feng
 * Created Date: 2020/10/10 10:31
 * Current User:feng
 * History User:历史修改者
 * Description:这个文件主要做什么事情
 */

namespace App\Modules\Admin\Http\Controllers;


use App\Http\Controllers\BaseController;
use App\Modules\Admin\Models\Menu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends BaseController
{

    public function __construct()
    {
        $this->title = 'MenuManagement';
        parent::__construct();
        $this->menu=app('request')->server('REQUEST_URI');
        //$this->setAdmin();
    }

    public function index()
    {
        $this->setAdmin();
        return view('admin::menu/index', ['menu' => Menu::all()]);
    }

    function test(){
        $this->setAdmin();
        return view('admin::menu/test');
    }
    public function add(Request $request)
    {
        $this->setAdmin();
        $parent=Menu::query()->where('parent_id',0)->get();
        //dd($request->server('REQUEST_URI'));
        return view('admin::menu/add',['parent_id'=>$parent]);
    }

    public function store()
    {
        Menu::create(request()->all());
        //session("message", "create menu success");
        return redirect()->intended(route("admin.menu", [], false))->with("message", "create menu success");
    }

    public function edit(int $id)
    {
        $this->setAdmin();
        $menu = Menu::find($id);
        return view('admin::menu/edit', ['menu' => $menu, 'id' => $id]);
    }

    public function update(int $id)
    {
        $menu = new Menu();
        $menu->where('id', $id)->update(request()->except(['_token']));
        return redirect()->route('admin.menu')->with('message', '更新成功');
    }
}
