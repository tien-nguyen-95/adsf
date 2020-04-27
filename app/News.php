<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag', 'id_news', 'id_tag');
    }
}
