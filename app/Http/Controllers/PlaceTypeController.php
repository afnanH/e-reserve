<?php

namespace App\Http\Controllers;


use App\Place_type;
use Auth;
use App\Http\Requests;
use App\User;
use App\Gps;
use DB;
use App\Http\Controllers\Controller;
use Request;
use Excel;
use File;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;

class PlaceTypeController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function checknamecategory()
 {
    
    $categoryname=Input::get('name');
      $category = DB::table('categories')
     ->where('categories.Name','=',$categoryname)
     ->select('*')->get();
     if($category==null)     
        $isAvailable = true;
        else
         $isAvailable = false;

    return \Response::json(array('valid' =>$isAvailable,));
 }

     public function checkEnglishnamecategory()
 {
    
    $categoryname=Input::get('EngName');
      $category = DB::table('categories')
     ->where('categories.EngName','=',$categoryname)
     ->select('*')->get();
     if($category==null)     
        $isAvailable = true;
        else
         $isAvailable = false;

    return \Response::json(array('valid' =>$isAvailable,));
 }

    public function index()
    {
      $PlacesType = Place_type::all(); 
      // dd($PlacesType );        
         return view('Places.PlaceType',compact('PlacesType'));



       
    }
    public function updatecategoryname()
    {
          try {

 if (Auth::check())
  {


    if(Auth::user()->can('edit-categories'))
      {

       $categoryid = Input::get('pk');  
        $column_name = Input::get('name');
        $column_value = Input::get('value');
    
        $category = Category::whereId($categoryid)->first();
        $category-> $column_name=$column_value;

        if($category->save())

        return \Response::json(array('status'=>1));
    else 
        return \Response::json(array('status'=>0));

      }
    else 
      {
     return \Response::json(array('status'=>'You do not have permission.'));
      }

   }//endAuth

else
{
return redirect('/login');
}

}//endtry
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
        return view('categories.createcategory');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          try {

 if (Auth::check())
  {


    if(Auth::user()->can('create-categories'))
      {

       $categoryname=Input::get('name');
        $categoryengname=Input::get('EngName');
        
        
        
            $category = New Category;
            $category->Name=$categoryname; 
            $category->EngName=$categoryengname; 
            $category->save();         
        
        return redirect('/categories');

      }
    else 
      {
    return view('errors.403');
      }

   }//endAuth

else
{
return redirect('/login');
}

}//endtry
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
    public function updateactive()
    {
                  try {

 if (Auth::check())
  {


    if(Auth::user()->can('edit-categories'))
      {

        $categoryid = Input::get('id'); 
        $active= Input::get('active');
        
        $category = Category::whereId($categoryid)->first();
        $category->active=$active;

        if($category->save())

          return \Response::json(array('status'=>1));
        else 
          return \Response::json(array('status'=>0));

      }
    else 
      {
     return \Response::json(array('status'=>'You do not have permission.'));
      }

   }//endAuth

else
{
return redirect('/login');
}

}//endtry
catch(Exception $e) 
    {
    return redirect('/login');
    }
      

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

 if (Auth::check())
  {


    if(Auth::user()->can('delete-categories'))
      {

           $category=Category::find($id);
        $category->delete();
        return redirect('/categories');

      }
    else 
      {
    return view('errors.403');
      }

   }//endAuth

else
{
return redirect('/login');
}

}//endtry
catch(Exception $e) 
    {
    return redirect('/login');
    }
   
    }
}
