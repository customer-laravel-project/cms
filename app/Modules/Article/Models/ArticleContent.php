<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    protected $table = "article_content";
    protected $fillable = [
        "id",
        "article_id",
        'content'
    ];
}
