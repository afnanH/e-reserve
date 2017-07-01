<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Controller;
use App\Districts;
use App\Government;
use Session;

class DistrictsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showadditem=1;
        Session::put('Government_id',null);
        $districts = Districts::all();
        $governments=Government::select('Name','id')->lists('Name','id');
        return view('Tools.District',compact('districts','governments','showadditem'));
    }
   public function showallDistriGovernment($id)
    {
        
try {

         Session::put('Government_id', $id);
        $showadditem=0;
        $districts = Districts::where('Government_Id','=',$id)->get(); 
         $governments=Government::select('Name','id')->lists('Name','id');
        return view('Tools.District',compact('districts','governments','showadditem'));
    


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
        //
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
        //
    }
}
