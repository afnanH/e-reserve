<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Excel;
use File;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Hall;
use App\Schadule;
use Illuminate\Support\Facades\Session;


class SchaduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $hall=Hall::where('Place_Id',Auth::user()->Place_Id)->get();
              
            return view('Schadule.eventSchadule',compact('hall'));
        }
        else
        {
            return redirect('/Home');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function create()
    {
        $hall=Hall::where('Place_Id',Auth::user()->Place_Id)->get();
        //$count=Hall::where('Place_Id',Auth::user()->Place_Id)->count();
        if($hall->count())
        {
            return view('Schadule.create',compact('hall'));
        }
        else
        {
            Session::flash('flash_message', 'يجب اضافة القاعات المتاحة أولا !');

            return redirect('/Schadule');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private function generalRequestRequired (Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Price' => 'required|numeric',
            'IsEvent' => 'required|numeric',
            'Date_From' => 'required',
            'Date_To' => 'required',
            'Time_From' => 'required',
            'Time_To' => 'required',
            'Notes' => 'required',
            'Event_Name' => 'required',
            'Tele' => 'required',
            'Hall_Id' => 'required'
        ]);
    }
    public function store(Request $request)
    {
        $rules = array(
            'Name' => 'required',
            'Price' => 'required|numeric',
            'IsEvent' => 'required|numeric',
            'Date_From' => 'required',
            'Date_To' => 'required',
            'Time_From' => 'required',
            'Time_To' => 'required',
            'Notes' => 'required',
            'Event_Name' => 'required',
            'Tele' => 'required',
            'Hall_Id' => 'required'
        );
        $this->validate($request, $rules);
        $input = $request->all();

            $event = new Schadule;
            
            $dtStart = new \DateTime;
            $dtStart->setTime($request->input('Start_H'), $request->input('Start_M'));
            $event->Time_From = $dtStart->format('H:i:s');
            
            $dtEnd = new \DateTime;
            $dtEnd->setTime($request->input('End_H'), $request->input('End_M'));
            $event->Time_To = $dtEnd->format('H:i:s');
            
            
            //$this->generalRequestRequired($request, $event);

            $event->Name = $request->input('Name');
            $event->Price = $request->input('Price');
            $event->IsEvent = $request->input('IsEvent');
            $event->Date_From = $request->input('Date_From');
            $event->Date_To = $request->input('Date_To');
            
            $event->Notes = $request->input('Notes');
            $event->Event_Name = $request->input('Event_Name');
            $event->Tele = $request->input('Tele');
            $event->Hall_Id = $request->input('Hall_Id');
            $event->User_Id = Auth::user()->id;
            $event->save();

            Session::flash('flash_message', 'Event successfully added!');

            return redirect('/Schadule');
        /*
        try
       {
            $event = new Schadule;
            
            $dtStart = new \DateTime;
            $dtStart->setTime($request->input('Start_H'), $request->input('Start_M'));
            $event->Time_From = $dtStart->format('H:i:s');
            
            $dtEnd = new \DateTime;
            $dtEnd->setTime($request->input('End_H'), $request->input('End_M'));
            $event->Time_To = $dtEnd->format('H:i:s');
            
            
            $this->generalRequestRequired($request, $event);

            $event->Name = $request->input('Name');
            $event->Price = $request->input('Price');
            $event->IsEvent = $request->input('IsEvent');
            $event->Date_From = $request->input('Date_From');
            $event->Date_To = $request->input('Date_To');
            
            $event->Notes = $request->input('Notes');
            $event->Event_Name = $request->input('Event_Name');
            $event->Tele = $request->input('Tele');
            $event->Hall_Id = $request->input('Hall_Id');
            $event->User_Id = Auth::user()->id;
            $event->save();

            Session::flash('flash_message', 'Event successfully added!');

            return redirect('/Schadule');
            
        }
        catch(Exception $e) 
        {
            Session::flash('flash_message', 'Invalid Data');
        }
       */
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
