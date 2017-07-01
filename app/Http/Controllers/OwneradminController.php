<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Controller;
use App\Type;
use App\Place;
use App\User;
use App\Packge;
use Session;


class OwneradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.AdminPlaceAdd');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
   

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
       
       
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
    public function update(Request $request,$id)
    {
      
        //Place Data To Save
        $Place = New Place();
        $Place->Name=Input::get('PlaceName');
        $Place->Address=Input::get('adress');
        $Place->Description=Input::get('Desc');
        $Place->Type=1;
        $Place->Packge_id =1;

        $Place->TelOwner=Input::get('TelOwner');
        $Place->OwnerName=Input::get('OwnerName');
        $Place->EmailOwner=Input::get('EmailOwner');

        $Place->Tele=Input::get('phone1');
        $Place->Tele2=Input::get('phone2');
        $Place->Facebook=Input::get('FaceBook');
        $Place->Youtube=Input::get('youtube');
        $Place->Twitter=Input::get('Twitter');
        $Place->website=Input::get('WebSite');

        $Place->save();



        // //UserData To Save
        // $User = New User();
        // $User->Place_Id=$Place->id;
        // $User->Name=Session::get('Name');
        // $User->Username=Session::get('Username');
        // $User->Email=Session::get('Email');
        // $User->Password=Session::get('Password');
        // $User->save();
        return view('Messages.SucessfullyRegestration');

        


         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
   
    }
}
