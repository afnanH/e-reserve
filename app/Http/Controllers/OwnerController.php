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


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $types=Type::lists('Name','id');
          $Packa1=Packge::where('id',1)->get();
          $Packa2=Packge::where('id',2)->get();
          $Packa3=Packge::where('id',3)->get();

          $Packages1=DB::table('packges_attributes')
                      ->join('packges','packges.id','=','packges_attributes.Packge_id')
                      ->join('attributes','attributes.id','=','packges_attributes.attrbuti_id')
                      ->where('packges_attributes.Packge_id',1)
                      ->select('packges.Name as PackName','packges.Price','attributes.Name')->get();

      $Packages2=DB::table('packges_attributes')
                      ->join('packges','packges.id','=','packges_attributes.Packge_id')
                      ->join('attributes','attributes.id','=','packges_attributes.attrbuti_id')
                      ->where('packges_attributes.Packge_id',2)
                      ->select('packges.Name as PackName','packges.Price','attributes.Name')->get();
       $Packages3=DB::table('packges_attributes')
                      ->join('packges','packges.id','=','packges_attributes.Packge_id')
                      ->join('attributes','attributes.id','=','packges_attributes.attrbuti_id')
                      ->where('packges_attributes.Packge_id',3)
                      ->select('packges.Name as PackName','packges.Price','attributes.Name')->get();
                      

        
         return view('admin.Owner1',compact('types','Packages1','Packages2','Packages3','Packa1','Packa2','Packa3'));
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
     
       
        Session::put('Name',Input::get('Name'));
        Session::put('Username',Input::get('Username') );

        Session::put('Email', Input::get('Email'));
        Session::put('Password', Input::get('Password'));

        Session::put('Packge_id', Input::get('Packge_id'));

        Session::put('Type',Input::get('Type') );

        return view('admin.Owner'); 
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
        $Place->Type=Session::get('Type');
        $Place->Packge_id =Session::get('Packge_id');

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



        //UserData To Save
        $User = New User();
        $User->Place_Id=$Place->id;
        $User->Name=Session::get('Name');
        $User->Username=Session::get('Username');
        $User->Email=Session::get('Email');
        $User->Password=Session::get('Password');
        $User->save();
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
