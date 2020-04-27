<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetail extends Model
{
    use SoftDeletes;
    protected $table = 'bill_detail';
    protected $primaryKey = 'id';

    protected $fillable = ['user_deleted'];

    public function bills()
    {
        return $this->belongsTo("App\Bills", 'id_bill', 'id')->withTrashed();
    }

    public function products()
    {
        return $this->belongsTo("App\Products", 'id_product', 'id')->withTrashed();
    }
}
