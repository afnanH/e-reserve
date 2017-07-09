<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Controller;
use App\Facility;
use Image;
use File;

class FacilitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try{
             $Facilites=Facility::all();

       return view('Tools.Facilites',compact('Facilites'));

        }
          catch(Exception $e) 
          {
         return redirect('/login');
         }
      
    }
    public function updateFacilites()
    {
           
        try
        {
       $ID = Input::get('pk');  
        $column_name = Input::get('name');
        $column_value = Input::get('value');
    
        $Facilites = Facility::whereId($ID)->first();
        $Facilites-> $column_name=$column_value;

        $Facilites->save();
        return redirect('/Facilites');
        
          
    }
       catch(Exception $e) 
          {
         return redirect('/login');
         }
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
         
            $Facilites = New Facilites;
            $Facilites->Name=Input::get('txtName'); 
            $file_img = Input::file('pic');
         
                $imageName = $file_img->getClientOriginalName();

                $path=public_path("/assets/dist/img/").$imageName;

                if (!file_exists($path)) {
                  $file_img->move(public_path("/assets/dist/img"),$imageName);
                  $Facilites->Image="/assets/dist/img/".$imageName;
                  
                }
                else
                {
                   $random_string = md5(microtime());
                   $file_img->move(public_path("/assets/dist/img"),$random_string.".jpg");
                   
                  $Facilites->Image="/assets/dist/img/".$random_string.".jpg";
                
                }
             // dd($Facilites);
            $Facilites->save();         
        
        return redirect('/Facilites');
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

           $Facilites=Facility::find($id);
        
        $Facilites->delete();
        return redirect('/Facilites');

     }//endtry
    catch(Exception $e) 
    {
    return redirect('/login');
    }
   
    
    }
}
