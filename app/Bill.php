<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bill extends Model
{
    use SoftDeletes;

    protected $table = 'bills';

    protected $primaryKey = 'id';

    protected $fillable = ['user_deleted'];

    public function customer(){
        return $this->belongsTo("App\Customer", 'id_customer', 'id')->withTrashed();
    }
}
