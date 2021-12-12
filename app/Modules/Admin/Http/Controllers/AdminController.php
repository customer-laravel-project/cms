<?php


namespace App\Modules\Admin\Http\Controllers;


use App\Http\Controllers\BaseController;
use App\Modules\Admin\Models\Admin;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->title = 'AdminManagement';
        parent::__construct();
    }
    public function index(){
        $this->setAdmin();
        return view("admin::admin.index",['admin'=>Admin::query()->paginate(1)]);
    }
}
