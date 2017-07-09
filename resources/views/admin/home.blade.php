<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RESERAVOR</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-rtl.css">
    <link rel="stylesheet" type="text/css" href="assets/css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
  </head>
  <body>
    <!--Navigation bar-->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/Home"><img src="assets/img/logo.png" class="img-responsive" alt="img25">
            
            </a>
         

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item active"><a href="/Home">الرئيسية <span class="sr-only">(current)</span></a></li>
          <li><a href="/Halls">القاعات</a></li>
          <li><a href="/Halls">المناسبات</a></li>
     
          <li><a href="#" data-target="#login" data-toggle="modal">تسجيل دخول</a></li>
          <li class="btn-trial"><a href="/Regest">مستخدم جديد</a></li>
        </ul>
        </div>
      </div>
    </nav>
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
          {!!Form::open(['action'=>'LoginController@Login','method' => 'post','files'=>true])!!}
              <div class="form-group">
               
                 <div class="form-group has-feedback"> <!----- username -------------->
                      <input class="form-control" name="Username" placeholder="البريد الإلكترونى "  id="loginid" type="text" autocomplete="off" /> 
            <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span><!---Alredy exists  ! -->
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback"><!----- password -------------->
                      <input class="form-control" name="Password" placeholder="كلمة السر " id="loginpsw" type="password" autocomplete="off" />
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
                      <button type="submit" class="btn btn-bg red btn-block">تسجيل</button>
                      
                      </div>
                  </div>
               {!!Form::close()!!}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!--/ Modal box-->
    <!--Banner-->
    <div class="banner">
      <div class="bg-color">
        <div class="container">
          <div class="row">
            <div class="banner-text text-center">
            
              <div class="intro-para text-center quote">
                <p class="big-text ">أول موقع حجز قاعات </p>
           
                    <p class="para-w3l">
                        نعرض لك كل الأماكن والقاعات الموجودة بخدماتها وإمكانيتها ونسهل لك اختيار المكان الأمثل لحجز موعدك الخاص 
                   
                        
        </p>
                <a href="#footer" class="btn get-quote">اشترك الآن</a>
              </div>
              <a href="#feature" class="mouse-hover"><div class="mouse"></div></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Banner-->
    <!--Feature-->
    <section id ="feature" class="section-padding">
      <div class="container">
        <div class="row">
            <div class="main_feature text-center">

                                 <div class="head_title text-center ">
                                    <h2 > ما الذى تقدمه   Reseravor </h2>
                                   
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
                            
                            <div class="col-sm-3">
                                <div class="single_feature">
                                    <div class="single_feature_icon">
                       <i class="fa fa-clock-o" aria-hidden="true"></i>

                                    </div>

                                    <h4>الراحة</h4>
                                        <div class="separator3"></div>
                                              <p class="lead"> لم تعد بحاجة لزيارة كل مكان بنفسك ، وفر وقتك وقم بزيارتنا </p>
                 
                           
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="single_feature">
                                    <div class="single_feature_icon">
                                   <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>

                                    <h4>سهولة البحث</h4>
                                        <div class="separator3"></div>
                                      <p class="lead"> اختر ما يناسب احتياجاتك من القاعات وإمكانياتها المتاحة لدينا </p>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="single_feature">
                                    <div class="single_feature_icon">
                                     <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                    <h4>تنظيم المواعيد</h4>
                                    <div class="separator3"></div>
 <p class="lead">
                                                 لم تعد بحاجة للتسجيل الورقي ، أصبح ترتيب مواعيدك الآن سهلاً من خلال خدمتنا </p>                  
                                </div>
                            </div>

                            
                            <div class="col-sm-3">
                                <div class="single_feature">
                                    <div class="single_feature_icon">
                                    <i class="fa fa-usd" aria-hidden="true"></i>
                                    </div>
                                    <h4>التوفير</h4>
                                   <div class="separator3"></div>
                                             <p class="lead">  قم باستغلال العروض الخاصة بايفنتاريا واحجز ايفنتاتك بأسعار أفضل </p>
                                
                                    
                                </div>
                            </div>
                         

                        </div>
        </div>
      </div>
    </section>
    <!--/ feature-->

  



    <!--Pricing-->
    <section id ="pricing" class="section-padding">
      <div class="container">
        <div class="row">
        
              <div class="head_title text-center ">
                                    <h2 > باقـتـنـا </h2>
                                     <p>اختر منها ما يناسبك</p>
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
          <div class="col-md-4 col-sm-4">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>المجانية</h4>
                <span class="fa fa-usd curency"></span> <span class="amount">0</span> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="/Regest" class="btn btn-bg green btn-block">تسجيل جديد</a> 
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>المدفوعة</h4>
                <span class="fa fa-usd curency"></span> <span class="amount">100</span> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="/Regest" class="btn btn-bg yellow btn-block">تسجيل جديد</a> 
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="price-table">
              <!-- Plan  -->
              <div class="pricing-head">
                <h4>الذهبية</h4>
                <span class="fa fa-usd curency"></span> <span class="amount">500</span> 
              </div>
          
              <!-- Plean Detail -->
              <div class="price-in mart-15">
                <a href="/Regest" class="btn btn-bg red btn-block">تسجيل جديد</a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/ Pricing-->
    <!--Contact-->
    <section id ="contact" class="section-padding">
      <div class="container">
        <div class="row">
         
            
               <div class="head_title text-center ">
                                 <h2>اتـصـل بـنـا </h2>
            <p> يمكننك التواصل معنا من خلال القائمة التالية</p>
                                   
                                    <div class=" separator"></div>
                                </div><!-- End off Head_title -->
                            
            
            
            
            
        
          <form action="" method="post" role="form" class="contactForm">
              <div class="col-md-6 col-sm-6 col-xs-12 left">
                <div class="form-group">
                    <input type="text" name="name" class="form-control form" id="name" placeholder="الإسم" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="البريد الإلكترونى" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-md-6 col-sm-6 col-xs-12 right">
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="الرسالة"></textarea>
                    <div class="validation"></div>
                </div>
              </div>
              
              <div class="col-xs-12">
                <!-- Button -->
                <button type="submit" id="submit" name="submit" class="form contact-form-button light-form-button oswald light">إرسال  </button>
              </div>
          </form>
          
        </div>
      </div>
    </section>
    <!--/ Contact-->
    <!--Footer-->
    <footer id="footer" class="footer">
      <div class="container text-center">
    
      <h3>اشترك معنا ليصلك أخر العروض</h3>
    
      <form class="mc-trial row">
        <div class="form-group col-md-3 col-md-offset-2 col-sm-4">
          <div class=" controls">
            <input name="name" placeholder="الإسم" class="form-control" type="text">
          </div>
        </div><!-- End email input -->
        <div class="form-group col-md-3 col-sm-4">
          <div class=" controls">
            <input name="EMAIL" placeholder="البريد الإلكترونى" class="form-control" type="email">
          </div>
        </div><!-- End email input -->
        <div class="col-md-2 col-sm-4">
          <p>
          <a href="/Regest" class="btn btn-block btn-submit">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          اشترك
          </a>
          </p>
        </div>
      </form><!-- End newsletter-form -->
      <ul class="social-links">
        <li><a href="https://www.facebook.com/Eventarya/"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="https://www.facebook.com/Eventarya/"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="https://www.facebook.com/Eventarya/"><i class="fa fa-google-plus fa-fw"></i></a></li>
      
      </ul>
       
          
                  <div class="col-sm-4 col-xs-12 main_footer">
                    
                        

                                <p style="text-align: right;">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                
                              01118233093
                                    <br>
                                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                   
                                 Blerd2015@gmail.com
                                </p>




                     
                    </div>
                    
 <div class="col-md-4">


                      

                            <div id="templatemo_footer">
                                <a href="/Home">الرئيسية</a> | <a href="/Halls">القاعات </a> | <a href="/Halls">المناسبات </a> | <a href="#">العروض </a> <br />
                                جميع الحقوق محفوظة © 2017
                                <br>





                            </div>
                   

                    </div>



                    <div class="col-sm-4 col-xs-12 main_footer">
                        
                       


                                <p>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>  
                                    نتشرف بزيارتك
                                    <br>
                                جامعة أسيوط -مبنى شبكة المعلومات -الدور السادس

                      
                    </div>
                   


                
      </div>
    </footer>
    <!--/ Footer-->
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
  </body>
</html>