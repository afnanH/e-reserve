 @extends('masterUser')
@section('content')
 <!--/ Navigation bar-->
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
    <section id ="pricing" class="section-padding" >
      <div class="container">
        <div class="row">
        
              <div class="head_title text-center " style="    margin-top: 40px;">
                                    <h2 > من أنت ؟</h2>
                                  
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
          <div class="col-md-5 col-sm-5">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                  <img src="assets/img/12.jpg" class="img-responsive" alt="img25">
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15"  style="margin-top: 25px;">
                <a href="#" class="btn btn-bg green btn-block">مستخدم</a> 
              </div>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
       
          </div>
          <div class="col-md-5 col-sm-5">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
          <img src="assets/img/13.jpg" class="img-responsive" alt="img25">
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15" style="margin-top: 25px;">
                <a href="/Owner" class="btn btn-bg red btn-block">
    
                    
                    صاحب مكان</a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Pricing-->


     
      
      
      

       @stop