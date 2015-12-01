<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::group(['prefix'=> 'api/v1'], function(){
	//Route::get('/authenticate', 'AuthController@getAuthenticatedUser');
	Route::get('/users/isadmin', 'UsersController@isAdmin');

	Route::post('/authenticate', 'AuthController@authenticate');
	Route::post('/users/neworder', 'UsersController@newOrder');

	Route::get('/reports/sales/{start?}/{end?}', 'AdminController@salesReport');


	//Route::resource('/meals', 'MealsController');
	Route::resource('/menus', 'MenusController');
	Route::resource('/users', 'UsersController');
	Route::resource('/dishes', 'DishesController');
	Route::resource('/orders', 'OrdersController');
	Route::resource('/options', 'OptionsController');
	Route::resource('/beverages', 'BeveragesController');
});