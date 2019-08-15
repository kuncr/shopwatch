<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable=[
    	'material', 'case', 'strap', 'water_resistance', 'amount','product_id','description'
    ];
    public function product()
    {
    	return $this->hasOne('App\Product');
    }
}
