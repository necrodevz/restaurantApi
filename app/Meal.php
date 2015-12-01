<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['client_name', 'order_id', 'dish_name', 'options_hash'];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
}
