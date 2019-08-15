<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'category_id', 'brands_id', 'image', 'price'
    ];

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function productimages()
    {
    	return $this->hasMany('App\ProductImage');
    }
    public function orderdetail()
    {
    	return $this->hasOne('App\OrderDetail');
    }
    public function productdetails()
    {
        return $this->hasMany('App\ProductDetail');
    }
}
