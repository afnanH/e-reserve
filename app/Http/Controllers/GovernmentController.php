<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Controller;
use App\Government;

class GovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Government=Government::all();
        return view('Tools.Government',compact('Government'));
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
        try
       {
         
            $Government = New Government;
            $Government->Name=Input::get('txtName'); 
            $Government->save();         
        
        return redirect('/Government');
       }
        catch(Exception $e) 
        {
        return redirect('/login');
        }
    }
public function updateGovernments()
{
    try
        {
        $ID = Input::get('pk');  
        $column_name = Input::get('name');
        $column_value = Input::get('value');
        $Government = Government::whereId($ID)->first();
        $Government-> $column_name=$column_value;
        $Government->save();
        return redirect('/Government');    
        }
    catch(Exception $e) 
        {
         return redirect('/login');
        }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

           $Government=Government::find($id);
        
        $Government->delete();
        return redirect('/Government');

     }//endtry
    catch(Exception $e) 
    {
    return redirect('/login');
    }
   
    }
}
