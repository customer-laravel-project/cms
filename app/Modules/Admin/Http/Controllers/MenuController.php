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

class MenuController extends BaseController
{

    public function __construct()
    {
        $this->title = 'MenuManagement';
        parent::__construct();
    }
    public function index(){
        return view('admin::menu/index',['menu'=>Menu::all()]);
    }
    public function add(){
        return view('admin::menu/add');
    }
    public function store(){
        Menu::create(request()->all());
        return "success";
    }
    public function edit(int $id){
        $menu = Menu::find($id);
        return view('admin::menu/edit',['menu'=>$menu,'id'=>$id]);
    }
    public function update(int $id){
        $menu = new Menu();
        $menu->where('id',$id)->update(request()->except(['_token']));
       return redirect()->route('admin.menu')->with('message', '更新成功');
    }
}