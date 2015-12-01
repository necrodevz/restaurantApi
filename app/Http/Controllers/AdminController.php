<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Excel;

class AdminController extends Controller
{
    public function salesReport($start = null, $end = null)
    {
    	$orders = Order:with('meals'=> function($query){
    		$query->where('status_id', 2);
    	})->get();
    	$array = [];
    	foreach ($orders as $order) {
    		$orderCost = 0;

    		foreach ($order->meals as $meal) {
    			$orderCost = $orderCost + $meal->price;
    		}
    		$order->totPrice = $orderCost;
    		$array[] = $order;
    	}


    	return compact('start', 'end');
    }

    private function generateExcel($array)
    {
    	Excel::create('salesReport', function($excel){
    		$excel->setTitle()
    	})
    }
}
