<?php

namespace App\Modules\Articletype\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $table = "article_type";
    protected $fillable = [
        'name',
        'abbr',
        'sorts',
        'creator',
        'last_operator'
    ];
}
