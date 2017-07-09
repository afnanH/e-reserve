 @extends('masterUser')
@section('content')

 <!--Modal box-->
    <div class="modal fade" id="login" role="dialog">
      <div class="modal-dialog modal-sm">
      
        <!-- Modal content no 1-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center form-title">تسجيل دخول</h4>
          </div>
          <div class="modal-body padtrbl">

            <div class="login-box-body">
         
              <div class="form-group">
                <form name="" id="loginForm">
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control" placeholder="البريد الإلكترونى "  id="loginid" type="text" autocomplete="off" /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!----- password -------------->
                      <input class="form-control" placeholder="كلمة السر " id="loginpsw" type="password" autocomplete="off" />
            <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                      <div class="col-xs-12">
                          <div class="checkbox icheck">
                              <label>
                                <input type="checkbox" id="loginrem" > تذكر كلمة السر
                              </label>
                          </div>
                      </div>
                      <div class="col-xs-12">
                          <button type="button" class="btn btn-bg red btn-block" onclick="userlogin()">تسجيل </button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->

    <!--Pricing-->
    <section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
        
              <div class="head_title text-center " style="    margin-top: 40px;">
                                    <h2 > املأ البيانات الآتية
                  </h2>
                                  
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
            <div class="col-md-2"></div>
        	<div class="col-md-8 ">
				
			        {!! Form::open(['action' => "OwnerController@store",'method'=>'post','id'=>'profileForm']) !!} 
                        <div class="form-group">
    <label class="control-label col-sm-4" for="name">اسم الحساب:</label>
    <div class="col-sm-8">
      <input type="فثءف" class="form-control" name="Name" id="name" placeholder="Enter email">
    </div>
  </div>
<br/>
<br/>
     <div class="form-group">
    <label class="control-label col-sm-4" for="name">اسم المستخدم:</label>
    <div class="col-sm-8">
      <input type="فثءف" class="form-control" name="Username" id="name" placeholder="Enter email">
    </div>
  </div>
<br/>
<br/>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">البريد الإلكترونى:</label>
    <div class="col-sm-8">
      <input type="email" class="form-control"  name="Email" id="email" placeholder="Enter email">
    </div>
  </div>
  <br/>
<br/>
  <div class="form-group">
    <label class="control-label col-sm-4" for="pwd">كلمة السر:</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="pwd" name="Password" placeholder="Enter password">
    </div>
  </div>
  <br/>
<br/>
                       <div class="form-group">
    <label class="control-label col-sm-4" for="pwd"> تأكيد كلمة السر :</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
 <br/>
<br/>
<div class="form-group">
  <label class="control-label col-sm-4" for="sel1">نوع المكـان:</label>
     <div class="col-sm-8"> 
{!!Form::select('types', ([null => 'اختر نوع المكان'] + $types->toArray()) ,null,['class'=>'form-control','id' => 'prettify','name'=>'Type','required'=>'required'])!!}
    </div>
</div>



			
			   </div>
                <div class="col-md-2"></div>
        </div>
      </div>
    </section>
    <!--/ Pricing-->

<!-- Price section -->
			<section id="price">
				<div class="container">
					<div class="row">
					
						  <div class="head_title text-center ">
                                    <h2 >       باقــتـنـا 
                  </h2>
                                  
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
						
						<div class="col-md-4 wow animated fadeInUp">
							<div class="price-table1 text-center">
								@foreach($Packa1 as $Pack1)
								<span>{{$Pack1->Name}}</span>
								<div class="value">
									<span>L.E</span>
									<span>{{$Pack1->Price}}</span><br>
									<span>/زُشهريا</span>
								</div>
								@endforeach
								<ul>
									@foreach($Packages1 as $Pack1)
									<li><i class="fa fa-check-circle-o" aria-hidden="true"></i>{{$Pack1->Name}}</li>

									@endforeach
									
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.4s">
							<div class="price-table1 featured text-center">
								 @foreach($Packa2 as $Pack2)
								<span>{{$Pack2->Name}}</span>
								<div class="value">
									<span>L.E</span>
									<span>{{$Pack2->Price}}</span><br>
									<span>شهرياً</span>
								</div>
								@endforeach
								<ul>
															@foreach($Packages2 as $Pack2)
									<li><i class="fa fa-check-circle-o" aria-hidden="true"></i>{{$Pack2->Name}}</li>
									
@endforeach
								</ul>
							</div>
						</div>
						
						<div class="col-md-4 wow animated fadeInUp" data-wow-delay="0.8s">
							<div class="price-table1 text-center">
									@foreach($Packa3 as $Pack3)
								<span>{{$Pack3->Name}}</span>
								<div class="value">
									<span>L.E</span>
									<span>{{$Pack3->Price}}</span><br>
									<span>شهرياً</span>
								</div>
								@endforeach
								<ul>
										@foreach($Packages3 as $Pack3)
									<li><i class="fa fa-check-circle-o" aria-hidden="true"></i>{{$Pack3->Name}} </li>
									@endforeach
								</ul>
							</div>
                            
						</div>
                        



		
		<div class="col-md-6">
          </div>
                        <div class="col-md-3">
         </div>


         	



                        <div class="col-md-3">
         
            </div>
					</div>
				</div>
<br/>
<br/>
				<div class="col-md-12" style="background-color:lightgray;border-radius: 15px;height: 50px  ">

				<div class="col-md-4">المجانية
				<input name="Packge_id" checked="checked" type="radio" value="1" >
				</div>
				<div class="col-md-4">
				المميزة<input name="Packge_id" type="radio" value="2">
				</div>
				<div class="col-md-4">
				الذهبية<input  name="Packge_id" type="radio" value="3"> 
				</div>
	
									
                                    
</div>
<div class="col-md-12">
	<div class="col-md-4">
	
</div >

<div class="col-md-6" >
	<center>
		<button type="submit" style="float: left;" name="submitButton" class="col-md-3  btn-trial1"  >متابعة </button> 
	</center>
</div >
</div >
<br/><br/><br>
                 {!!Form::close()!!}
       @stop