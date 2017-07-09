<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use Request;
use Excel;
use File;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\User;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function Login()
    {
        $logintrue=User::where('Username',Input::get("Username"))
        ->where('Password',Input::get("Password"))->first();
       
        if($logintrue != null )
        {
             $userdata = array(
                'userid' => $logintrue->id
              );

             Session::put('user', $logintrue);

                  session(['user' => $logintrue]);
                  // dd(Session::get('user')->id);

                  Auth::loginUsingId(Session::get('user')->id);
                 

          return redirect('/Welcome');
        }
        else
        {
            return redirect('/Login');
        }
    }
    public function update(Request $request, $id)
    {
       
        
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
