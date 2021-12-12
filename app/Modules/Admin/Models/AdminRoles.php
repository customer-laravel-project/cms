<?php
namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminRoles extends Model
{
    protected $table = "admin";
    protected $fillable=[
        'admin_id','rile_id'
    ];

//    public function roles(){
//        return $this->hasMany(Role::class,'admin_roles');
//       // return $this->belongsToMany(Role::class,'admin_roles','role_id','admin_id');
//    }
}
