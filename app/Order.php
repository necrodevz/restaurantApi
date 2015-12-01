<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_date'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function meals()
    {
    	return $this->hasMany('App\Meal');
    }

    public function setOrderDateAttribute($date)
    {
    	$this->attributes['order_date'] = Carbon::createFromFormat('Y-m-d', $date);
    }
}
