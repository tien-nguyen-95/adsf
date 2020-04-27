<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = ['user_deleted'];

    public function productType(){
        return $this->belongsTo("App\ProductType", 'id_type', 'id')->withTrashed();
    }

    public function get_sale_price(Type $var = null)
    {
        return round($this->unit_price - $this->unit_price*$this->promotion/100);
    }

    public function get_price(Type $var = null)
    {
        return $this->sale? number_format(round($this->unit_price - $this->unit_price*$this->promotion/100)):number_format($this->unit_price);
    }
}
