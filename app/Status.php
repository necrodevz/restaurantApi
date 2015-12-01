<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function orders()
    {
    	$this->hasMany('App\Order');
    }
}
