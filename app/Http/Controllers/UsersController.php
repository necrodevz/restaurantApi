<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('orders')->get();
    }

    public function newOrder(Request $request)
    {
        $date = $request->only('date');
        $user = AuthController::getAuthenticatedUser();
        try {
            $user->orders()->create($date);

        } catch (Exception $e) {
            return $e;
        }
    }

    public function isAdmin()
    {
        $user = AuthController::getAuthenticatedUser();
        return $user->admin;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uData = $request->only('fname', 'lname', 'email', 'tel', 'admin');

        try {
            $user = User::create($uData);
            $user->password = Hash::make($uData['password']);
            $user->save();
            $response = [$user];
        } catch (Exception $e) {
            $response = [$e];
        }

        return compact('response');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = AuthController::getAuthenticatedUser();
        $user->load('orders', 'orders.meals');
        return compact('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uData = $request->only('fname', 'lname', 'email', 'password', 'admin');
        $result = array_filter( $uData, 'strlen'); 
        try {
            $user = User::find($id);
            $user->update($result);
            $response = $user;
        } catch (Exception $e) {
            $response = $e;
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return compact('user');
    }
}
