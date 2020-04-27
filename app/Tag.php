<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $table = 'tags';

    protected $primaryKey = 'id';

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag', 'id_news', 'id_tag');
    }
}
