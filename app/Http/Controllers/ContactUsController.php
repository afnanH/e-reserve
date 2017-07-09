<?php

namespace App\Http\Controllers;


use App\Category;
use Auth;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use Mail;
use App\Hall;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
         return view('admin.ContactUs');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
     public function SendContactUs()
    {
        $data=array('Name'=>Input::get('Name'),'Email'=>Input::get('Email'),'Subject'=>Input::get('Subject'),'message'=>Input::get('message'));
        Mail::send('emails.mailEvent', $data, function($message) use ($data) {
            $message->to($data['Email']);
            $message->subject('Hi'+$data['Name']);
        });
        
       return redirect('/Halls');
        
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
         
   
    }
}
