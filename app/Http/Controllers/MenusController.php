<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;

class MenusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::with('dishes', 'options', 'beverages')->all();
        return compact('menus');
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
        $menu = Menu::create($request->only('date'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $menu = Menu::with('dishes')->find($id);
        $update = $request->only('op','type', 'id');
        try {
            if ($update['op'] === 1) {
                $this->addToMenu($update['type'], $update['id'], $menu);
            }else{
                if ($update['op']=== 0) {
                    $this->rmFrMenu($update['type'], $update['id'], $menu);
                }
            }

            return compact('menu');
        } catch (Exception $e) {
            return $e;
        }
    }

    private function addToMenu($type, $id, $menu)
    {
        switch ($type) {
            case 'd':
                $menu->dishes()->attach($id);
                break;
            case 'o':
                $menu->options()->attach($id);
                break;
            case 'b':
                $menu->beverages()->attach($id);
                break;
            
            default:
                # code...
                break;
        }
    }

    private function rmFrMenu($type, $id, $menu)
    {
        switch ($type) {
            case 'd':
                $menu->dishes()->dettach($id);
                break;
            case 'o':
                $menu->options()->dettach($id);
                break;
            case 'b':
                $menu->beverages()->dettach($id);
                break;
            
            default:
                # code...
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
