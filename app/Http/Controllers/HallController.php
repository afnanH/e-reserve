<?php

namespace App\Http\Controllers;

use Auth;
//use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
//use Request;
use Illuminate\Http\Request;
use Excel;
use File;
use Illuminate\Support\Facades\Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Input;
use App\Hall;
use App\Type;
use App\Government;
use App\District;
use App\Facility;
use App\Schadule;
use View;
class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $stats=Hall::simplePaginate(5);
        $halles=Hall::all();
        $pagecount=ceil(count($halles)/5);
        $types=Type::lists('Name', 'Name');
        $price=Hall::orderBy('Price', 'desc')->first();
        $price1=Hall::orderBy('Price', 'asc')->first();
        $Capacity=Hall::orderBy('Capacity', 'desc')->first();
        $Capacity1=Hall::orderBy('Capacity', 'asc')->first();
        $Facilities=Facility::all();
        $MaxPrice=$price->Price;
        $MinPrice=$price1->Price;
        $MaxCapcity=$Capacity->Capacity;
        $MinCapcity=$Capacity1->Capacity;
        $Government=Government::lists('name', 'id');
        $District=District::lists('name', 'id');
        return view('halls.index',compact('stats','types','MaxPrice','MinPrice','MaxCapcity','MinCapcity','Government','District','pagecount','Facilities')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeAll()
    {
       
        $Price=Input::get('Price');
        $Capcity=Input::get('Capcity');
        $fromdate=Input::get('fromdate');
        $todate=Input::get('todate');
        $District=Input::get('District');
        $Government=Input::get('Government');
        $Type=Input::get('Type');

        $price1=Hall::orderBy('Price', 'asc')->first();
        $MinPrice=$price1->Price;
        $Capacity1=Hall::orderBy('Capacity', 'asc')->first();
        $MinCapcity=$Capacity1->Capacity;

        if($fromdate=="2012-06-15 14:45" && $todate=="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="")
        {
            $stats=Hall::whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->simplePaginate(5);

            $halles=Hall::whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->get();
           
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate=="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
            
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
            ->select('halles.*')
            ->simplePaginate(5);
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
            ->select('halles.*')
            ->get();
            
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
           $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
           ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->get();
            
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
                
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();

        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government=="" && $Type!="") {
                $stats=Hall::where('Resv_Type',$Type)
                    ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                    ->whereBetween('halles.Price',[$MinPrice,$Price])
                    ->simplePaginate(5);
                $halles=Hall::where('Resv_Type',$Type)
                    ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                    ->whereBetween('halles.Price',[$MinPrice,$Price])
                    ->get();
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->simplePaginate(5);
               
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
             $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
             $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
             ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('Resv_Type',$Type)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('Resv_Type',$Type)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type!="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Resv_Type',$Type)
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Resv_Type',$Type)
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
           ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
           $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);

            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type =="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
               ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
       
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type =="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->simplePaginate(5);
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        $pagecount=ceil(count($halles)/5);
        $html = View::make('halls.particalview', compact('stats','pagecount'))->render();
        return Response::json(['html' => $html]);
    }
    
    public function changecont()
    {
        
        $Price=Input::get('Price');
        $Capcity=Input::get('Capcity');
        $fromdate=Input::get('fromdate');
        $todate=Input::get('todate');
        $District=Input::get('District');
        $Government=Input::get('Government');
        $Type=Input::get('Type');
        $count=Input::get('count');
        $start=5*($count-1);

        $price1=Hall::orderBy('halles.Price', 'asc')->first();
        $MinPrice=$price1->Price;
        $Capacity1=Hall::orderBy('Capacity', 'asc')->first();
        $MinCapcity=$Capacity1->Capacity;

         if($fromdate=="2012-06-15 14:45" && $todate=="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="")
        {
            $stats=Hall::whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->skip($start)->take(5)->get();

            $halles=Hall::whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->get();
           
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate=="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
            ->select('halles.*')
            ->skip($start)->take(5)->get();
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('halles.Price',[$MinPrice,$Price])
            ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
            ->select('halles.*')
            ->get();
            
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
           $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
           ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->get();
            
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
                
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();

        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government=="" && $Type!="") {
                $stats=Hall::where('Resv_Type',$Type)
                    ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                    ->whereBetween('halles.Price',[$MinPrice,$Price])
                    ->skip($start)->take(5)->get();
                $halles=Hall::where('Resv_Type',$Type)
                    ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                    ->whereBetween('halles.Price',[$MinPrice,$Price])
                    ->get();
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type=="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate!="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
             $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
             $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
             ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate=="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
            $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
            $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('Resv_Type',$Type)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->where('Resv_Type',$Type)
                ->where('District_Id',$District)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District=="" && $Government!="" && $Type!="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Resv_Type',$Type)
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Resv_Type',$Type)
                ->where('Government_Id',$Government)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
           ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
            ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type=="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government=="" && $Type !="") {
           $stats=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
           ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('schadules','schadules.Hall_Id','=','halles.id')
            ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type =="") {
           $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
               ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate !="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$fromdate])
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type =="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government=="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
            $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
         elseif ($fromdate =="2012-06-15 14:45" && $todate =="2012-06-20 14:45" && $District!="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->where('Government_Id',$Government)
                ->where('District_Id',$District)
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        elseif ($fromdate =="2012-06-15 14:45" && $todate !="2012-06-20 14:45" && $District=="" && $Government!="" && $Type !="") {
               $stats=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->skip($start)->take(5)->get();
                $halles=Hall::join('places','places.id','=','halles.Place_Id')
                ->join('districts','districts.id','=','places.District_Id')
                ->join('schadules','schadules.Hall_Id','=','halles.id')
                ->where('Government_Id',$Government)
                ->whereRaw('? Not between Date_From and Date_To', [$todate])
                ->where('Resv_Type',$Type)
                ->whereBetween('Capacity',[$MinCapcity,$Capcity])
                ->whereBetween('halles.Price',[$MinPrice,$Price])
                ->select('halles.*')
                ->get();
        }
        $pagecount=ceil(count($halles)/5);
        $html = View::make('halls.particalview', compact('stats','pagecount'))->render();
        return Response::json(['html' => $html]);
    }
     public function changeFacilty()
    {
        $Price=Input::get('Price');
        $Capcity=Input::get('Capcity');
        $id=Input::get('id');
        $price1=Hall::orderBy('halles.Price', 'asc')->first();
        $MinPrice=$price1->Price;
        $Capacity1=Hall::orderBy('Capacity', 'asc')->first();
        $MinCapcity=$Capacity1->Capacity;

            $stats=Hall::join('halles_facilites','halles_facilites.Hall_id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('Price',[$MinPrice,$Price])
            ->where('halles_facilites.Facility_id',$id)
            ->simplePaginate(5);

            $halles=Hall::join('halles_facilites','halles_facilites.Hall_id','=','halles.id')
            ->whereBetween('Capacity',[$MinCapcity,$Capcity])
            ->whereBetween('Price',[$MinPrice,$Price])
            ->where('halles_facilites.Facility_id',$id)
            ->get();
        $pagecount=ceil(count($halles)/5);
        $html = View::make('halls.particalview', compact('stats','pagecount'))->render();
        return Response::json(['html' => $html]);
    }

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
        $hall=Hall::find($id);
       $hallall=Hall::where('Place_Id',$hall->Place_Id)->get();
       $events=Schadule::where('Hall_Id',$id)->get();

        return view('halls.hall',compact('hall','hallall','events'));
    }

    public function GetEvents (Request $request)
    {
       //$hallall=Hall::where('User_Id',$hall->User_Id)->get();
       $query=Schadule::where(['Hall_Id' => $request->id])->get();
       $events = array();
       foreach ($query as $e)
       {
           $result = array();

           $stringStart = $e['Date_From'] . ' ' . $e['Time_From'];
            $dateStart = new \DateTime($stringStart);
             
            $stringEnd = $e['Date_To'] . ' ' . $e['Time_To'];
            $dateEnd = new \DateTime($stringEnd);

            $result['title'] = $e['Event_Name'];
            $result['start'] = $dateStart->format('Y-m-d H:i:s');
            $result['end'] = $dateEnd->format('Y-m-d H:i:s');
            $result['allDay'] = false;
            $result['color'] = '#841851';
            $result['className'] = $e['Hall_Id'];

            // Merge the event array into the return array
            array_push($events,$result);

        }

       return json_encode($events);
    }
    

    public function dd($id)
    {
        return view('halls.hall');
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
