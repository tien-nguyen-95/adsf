<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewTag extends Model
{
    protected $table = 'news_tag';

    protected $primaryKey = 'id';
}
