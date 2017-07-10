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

    public function store(Request $request)
    {
        $rules = array(
            'Name' => 'required',
            'Price' => 'required|numeric',
            'IsEvent' => 'required|numeric',
            'Date_From' => 'required|date_format:"Y-m-d"',
            'Date_To' => 'required|date_format:"Y-m-d"',
            'Start_M' => 'required',
            'Start_H' => 'required',
            'End_M' => 'required',
            'End_H' => 'required',
            'Notes' => 'required',
            'Event_Name' => 'required',
            'Tele' => 'required|numeric',
            'Hall_Id' => 'required'
        );

        
            $input = $request->all();

            $event = new Schadule;
            
            $dtStart = new \DateTime;
            $dtStart->setTime($request->input('Start_H'), $request->input('Start_M'));
            $event->Time_From = $dtStart->format('H:i:s');
            
            $dtEnd = new \DateTime;
            $dtEnd->setTime($request->input('End_H'), $request->input('End_M'));
            $event->Time_To = $dtEnd->format('H:i:s');

            $this->validate($request, $rules);

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

            if($event->Date_To < $event->Date_From)
            {
                Session::flash('flash_message', 'Invalid date');

                return redirect('/create');
            }
            if(($event->Time_To < $event->Time_From) && ($event->Date_To == $event->Date_From))
            {
                Session::flash('flash_message', 'Invalid time');

                return redirect('/create');
            }
            $query1 = Schadule::where([
                ['Hall_Id','=', $event->Hall_Id]])->get();
  
            if ($query1->count())
            {
                foreach($query1 as $q)
                {    
                    if( (($q->Date_From >= $event->Date_From) && ($q->Date_To <= $event->Date_To))
                        || (($q->Date_From <= $event->Date_From) && ($q->Date_To >= $event->Date_To))
                        || (($q->Date_From >= $event->Date_From) && ($q->Date_To >= $event->Date_To)
                                && ($q->Date_From <= $event->Date_To))
                        || (($q->Date_From <= $event->Date_From) && ($q->Date_To <= $event->Date_To)
                                && ($q->Date_To >= $event->Date_From)))

                    {
                        if( (($q->Time_From >= $event->Time_From) && ($q->Time_To <= $event->Time_To))
                            || (($q->Time_From <= $event->Time_From) && ($q->Time_To >= $event->Time_To))
                            || (($q->Time_To >= $event->Time_From) && ($q->Time_From >= $event->Time_From)
                                && ($q->Time_To >= $event->Time_To))
                            || (($q->Time_To >= $event->Time_From) && ($q->Time_From <= $event->Time_From)
                                && ($q->Time_To <= $event->Time_To)))
                        {
                            Session::flash('flash_message', 'The hall is reserved in this date & time .. Plz choose another hall or another time & date');

                            return redirect('/create');
                        }
                    }
                }
                    $event->save();

                    Session::flash('flash_message', 'Event successfully added!');

                    return redirect('/Schadule');
             }
            else
            {
                $event->save();

                Session::flash('flash_message', 'Event successfully added!');

                return redirect('/Schadule');
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
        //
    }
}
