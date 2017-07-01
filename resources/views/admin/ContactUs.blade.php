 @extends('masterUser')
@section('content')
  <!-- Bootstrap core CSS -->

    <link href="/assets/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
       <style>
           html , body {
               height: 100%;
           }

.view {
    height: 100%;
    width: 100%;
}
           header{
               height: 40%;
           }
           .flex-center h2 {
               font-size: 33px;
               color: white;
               margin-top: 16%;
           }
           
           
           .view {
            background: url("/assets/img/head.jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
        .contact_info_content{
    background: #fff;
    overflow: hidden;
    box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.01);
         padding-bottom: 34%;

}
.contact_info_content h3{
    color:#8eddc2;
margin-top: 5%;
    font-weight: bold;
    margin-bottom: 5%;
      font-size: 18px;
}
.contact_info_content h4{

    font-weight: 400;
    font-size: 16px;
}
.contact_info_content h4{
  
    padding: 0;
margin-bottom: 1px;
}
.single_contant_left{
    background: #fff;
    overflow: hidden;
    box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.01);
     padding-bottom: 1%;
     
    
}
.single_contact_info{
    margin-bottom:4.3%;
    overflow: hidden;
}
#formid {
    margin-top: 5%;
   
}
.btncontact {
    text-align: left;
}
       
    </style>



<body>
   <section id="contact" class="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="contact_contant sections">
                                <div class="head_title text-center">
                                    <h2>اتصل بنا </h2>
                                   <p> يمكنك التواصل مع فريق مواعيدك من خلال القائمة التالية</p>
                                    <div class="separator"></div>
                                </div><!-- End off Head_title -->
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="main_contact_info">
                                            <div class="row">
                                                <div class="contact_info_content ">
                                                    <div class="col-sm-12">
                                                        <div class="single_contact_info">
                                                            <div class="single_info_text">
                                                                
                                                                <h3> <i class="fa fa-map-marker" aria-hidden="true"></i> العنوان</h3>
                                                                <h4>جامعة أسيوط - مبنى شبكة المعلومات - الدور السادس </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="single_contact_info">
                                                            <div class="single_info_text">
                                                              
                                                                <h3>   <i class="fa fa-phone-square" aria-hidden="true"></i> ارقام التليفون</h3>
                                                                  <h4>+ 01062425848</h4>
                                                                <h4>+01008177128</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="single_contact_info">
                                                            <div class="single_info_text">
                                                                <h3> <i class="fa fa-envelope" aria-hidden="true"></i> البريد الإلكترونى</h3>
                                                                <h4>blerd2016@gmail.com</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="col-sm-12">
                                                        <div class="single_contact_info">
                                                            <div class="single_info_text">
                                                                <h3> <i class="fa fa-clock-o" aria-hidden="true"></i> مواعيد العمل</h3>
                                                                  <h4>من 9 صباحاً ل 5  مساءً</h4>
                                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-sm-6">
                                        <div class="single_contant_left padding-top-90 padding-bottom-90">
                                             {!! Form::open(['action' => "ContactUsController@SendContactUs",'method'=>'post','id'=>'profileForm']) !!}  
                                                <div class="col-lg-8 col-md-8 col-sm-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-1">

                                                    <div class="row">
                                                        <div class="col-sm-12 ">
                                                               <div class="form-group row ">
      <label for="inputEmail3" class=" col-form-label main2">الإســــــم </label>
      <div>
        <input type="text" name="Name" class="form-control" id="inputEmail3" placeholder="الإسم">
      </div>
    </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                                   <div class="form-group row">
      <label for="inputEmail3" class=" col-form-label main2">البريد الإلكترونى </label>
      <div >
        <input type="email" name="Email" class="form-control" id="inputEmail3" placeholder="البريد الإلكترونى ">
      </div>
    </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                                                         <div class="form-group row">
    <label for="exampleTextarea"  class="main2" >الموضــــوع </label>
  
                                                                                                                              <textarea class="form-control " name="Subject" rows="2" placeholder="الموضوع"></textarea>
  </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                            <label for="exampleTextarea"   class="main2"  >الرسالة </label>
                      <textarea class="form-control message " name="message" id="exampleTextarea"  placeholder="الرسالة"  rows="5"></textarea>
                                                    </div>

                                                    <div class="btncontact">
                                                      <input type="submit" class="" style="background-color:#fd6239 ;color:white" value="إرسال"/>
                                                    </div>
                                                </div> 
                                            {!!Form::close()!!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End of contact section -->
    

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/assets/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>

       <!-- Animations init-->
    <script>
        new WOW().init();
    </script>
@stop