<?php
/**
 * Created User: feng
 * Created Date: 2020/10/9 17:56
 * Current User:feng
 * History User:历史修改者
 * Description:这个文件主要做什么事情
 */
namespace App\Modules\Admin\Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model{
    protected $table = "menu";
    protected $fillable=[
        'name','icon','uri','parent_id'
    ];
    public function roles(){
        return $this->belongsToMany(Role::class,'roles_menus','menu_id','role_id');
    }
}
