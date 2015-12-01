<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = ['name'];

    public function menus()
    {
    	return $this->belongsToMany('App\Menu');
    }
}
