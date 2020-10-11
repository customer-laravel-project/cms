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
use App\Modules\Admin\Models\Role;

class RoleController extends BaseController
{

    public function __construct()
    {
        $this->title = 'RoleManagement';
        parent::__construct();
    }
    public function index(){
        $role = Role::select(['name','slug','id'])->with(['menu'=>function($q){
            $q->select('name');
        }])->get()->toArray();
        return view('admin::role/index',['role'=>$role]);
    }
    public function add(){
        return view('admin::role/add');
    }
    public function store(){
        Role::create(request()->all());
        return redirect()->route('admin.role')->with('message', '新增角色成功');
    }
    public function edit(int $id){
        $role = Role::find($id);
        return view('admin::role/edit',['role'=>$role,'id'=>$id]);
    }
    public function update(int $id){
        $role = new Role();
        $role->where('id',$id)->update(request()->except(['_token']));
       return redirect()->route('admin.role')->with('message', '更新角色成功');
    }
}