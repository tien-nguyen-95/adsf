<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = ['user_deleted'];

    public function bill(){
        return $this->belongsTo("App\Customer", 'id_customer', 'id')->withTrashed();
    }
}
