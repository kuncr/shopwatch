<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'tel', 'address', 'name', 'user_id','confirm'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function orderdetails()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
