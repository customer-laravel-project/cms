<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";
    protected $fillable = ['name', 'article_type', 'content', 'author', 'creator', 'last_operator', 'audit'];
}
