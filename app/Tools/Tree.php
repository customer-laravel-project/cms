<?php

/**
 * Created User: feng
 * Created Date: 2020/11/14 20:26
 * Current User:feng
 * History User:历史修改者
 * Description:这个文件主要做什么事情
 */

namespace App\Tools;

use App\Modules\Admin\Models\Menu;

class Tree
{

    protected $tree = [];


    public static function getTree()
    {
        $menu = Menu::query()->where('is_show',1)->orderBy("order")->get()->toArray();
        return self::generator($menu, 0);
        return $menu;
    }

    public static function generator($data, $pid)
    {
        $tree = [];
        foreach ($data as $key => $val) {
            if ($val['parent_id'] == $pid) {
                if (!empty(self::generator($data, $val['id']))) {
                    $val['children'] = self::generator($data, $val['id']);
                }
                $tree[] = $val;
            }
        }
        return $tree;
    }


}
