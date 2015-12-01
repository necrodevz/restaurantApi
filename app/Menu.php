<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Menu extends Model
{
  public function dishes()
  {
  	return $this->belongsToMany('App\Dish');
  }

  public function options()
  {
    return $this->belongsToMany('App\Option');
  }

  public function beverages()
  {
    return $this->belongsToMany('App\Beverage');
  }

  //public function setDateAttribute($date)
  //{
  	//$this->attributes['date'] = Carbon::createFromFormat('Y-m-d H', $date.' 00:00:00');
  //}


  public function scopeCurrentMenu($query)
  {
    return $query->where('date', Carbon::today()->format('Ymd'));
  }
}
