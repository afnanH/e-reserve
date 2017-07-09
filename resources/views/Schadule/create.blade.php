
@extends('master')
@section('content')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


  <script>
  $(document).ready(function() {
      for(var i = 0; i < 24; i++) {
	var s = i.toString();
	if(s.length == 1) {
		s = "0" + s; 
	}
	document.getElementById("starthrs1").innerHTML += ("<option value='" + i + "'>" + s + "  </option>");
    document.getElementById("starthrs2").innerHTML += ("<option value='" + i + "'>" + s + "  </option>");
}
for(var i = 0; i < 60; i++) {
	var s = i.toString();
	if(s.length == 1) {
		s = "0" + s; 
	}
	document.getElementById("startmins1").innerHTML += ("<option value='" + i + "'>" + s + "  </option>");
    document.getElementById("startmins2").innerHTML += ("<option value='" + i + "'>" + s + "  </option>");
}
for(var i = 1; i < 32; i++) {
	var s = i.toString();
	if(s.length == 1) {
		s = "0" + s;
	}

}

  });
  
    $( function() {
    $( "#datepicker1" ).datepicker(
        {
            dateFormat: "yy-mm-dd",
        }
    );
    $( "#datepicker2" ).datepicker(
        {
            dateFormat: "yy-mm-dd"
        }
    );
  } );
  </script>

<section class="panel panel-primary">
  <div class="panel-body" dir="rtl">
   
    <h1> اضافة ايفينت</h1>
        <br/>
        {!! Form::open(array('action' => 'SchaduleController@store')) !!}
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text" name = "Name" required>
                </div>
                <div class = "col-sm-2">
                    <label>الاسم</label>
                </div>
            </div>
            <br/>
            <div class = "row">
            <div class = "col-sm-10">
                    <input type = "text" name = "Price" required>
                </div>
                <div class = "col-sm-2">
                    <label>السعر</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text" name = "IsEvent" required>
                </div>
                <div class = "col-sm-2">
                    <label>IsEvent</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text"  id="datepicker1" required name = "Date_From">
                </div>
                <div class = "col-sm-2">
                    <label>التاريخ من</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text" id="datepicker2" required name = "Date_To">
                </div>
                <div class = "col-sm-2">
                    <label>التاريخ الى</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <select id="startmins1" required name = "Start_M" ></select>
                    <select id="starthrs1" required name = "Start_H"></select>
                </div>
                <div class = "col-sm-2">
                    <label>الوقت من</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    
                    <select id="startmins2" required name = "End_M" ></select>
                    <select id="starthrs2" required name = "End_H"></select>
                </div>
                <div class = "col-sm-2">
                    <label>الوقت الي</label>
                </div>
            </div>
            <br/>
            <div class = "row">
            <div class = "col-sm-10">
                    <input type = "text" required name = "Notes">
                </div>
                <div class = "col-sm-2">
                    <label>ملاحظات</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text" required name = "Event_Name">
                </div>
                <div class = "col-sm-2">
                    <label>اسم الايفينت</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <input type = "text" required name = "Tele">
                </div>
                <div class = "col-sm-2">
                    <label>تليفون</label>
                </div>
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-10">
                    <select name = "Hall_Id">
                        @foreach($hall as $all)
                            <option value ='{{ $all->id }}'>{{ $all->Name }}<option>
                        @endforeach
                    </select>
                </div>
                <div class = "col-sm-2">
                    <label>القاعة</label>
                </div> 
            </div>
            <br/>
            <div class = "row">
                <div class = "col-sm-6">
                    <button type="submit" name="submitButton" class="btn btn-info"  >حفظ </button> 
                </div>
                <div class = "col-sm-6">
                </div> 
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!!Form::close() !!}
    </div>
</section>
@stop