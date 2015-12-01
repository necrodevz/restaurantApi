<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    public function menus()
    {
    	return $this->belongsToMany('App\Menu');
    }
}
