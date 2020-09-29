<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
class Order extends Model
{
    protected $fillable = [
    	'tel', 'address', 'name', 'user_id','confirm'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function orderdetails()
    {
    	return $this->hasMany('App\OrderDetail');
    }
}
