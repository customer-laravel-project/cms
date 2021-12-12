<?php
namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admin";
    protected $fillable=[
        'name','email','password'
    ];

    public function role(){
        //return $this->morphToMany(AdminRoles::clearBootedModels(),'roles');
        return $this->belongsToMany(Role::class,'admin_roles')->with('menu');
    }
}
