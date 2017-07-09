<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halls</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

 <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
       
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">



    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
     <link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">
  <style type="text/css">
.range {
    display: table;
    position: relative;
    height: 25px;
    margin-top: 20px;
    background-color: rgb(245, 245, 245);
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

.range input[type="range"] {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;

    display: table-cell;
    width: 100%;
    background-color: transparent;
    height: 25px;
    cursor: pointer;
}
.range input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;

    width: 11px;
    height: 25px;
    color: rgb(255, 255, 255);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0px;
    background-color: rgb(153, 153, 153);
}

.range input[type="range"]::-moz-slider-thumb {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;
    
    width: 11px;
    height: 25px;
    color: rgb(255, 255, 255);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0px;
    background-color: rgb(153, 153, 153);
}

.range output {
    display: table-cell;
    padding: 3px 5px 2px;
    min-width: 40px;
    color: rgb(255, 255, 255);
    background-color: rgb(153, 153, 153);
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;

    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    transition: all 0.5s ease;

    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
}
.range.range-success input[type="range"]::-webkit-slider-thumb {
    background-color: rgb(92, 184, 92);
}
.range.range-success input[type="range"]::-moz-slider-thumb {
    background-color: rgb(92, 184, 92);
}
.range.range-success output {
    background-color: rgb(92, 184, 92);
}
.range.range-success input[type="range"] {
    outline-color: rgb(92, 184, 92);
}

.range.range-warning input[type="range"]::-webkit-slider-thumb {
    background-color: rgb(240, 173, 78);
}
.range.range-warning input[type="range"]::-moz-slider-thumb {
    background-color: rgb(240, 173, 78);
}
.range.range-warning output {
    background-color: rgb(240, 173, 78);
}
.range.range-warning input[type="range"] {
    outline-color: rgb(240, 173, 78);
}


    </style>
</head>
<body>
  


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
    <br/><br/><br/>
<br/><br/>

  

    <div class="row" style="background-color:#841851;">
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
      
        <div  class="row" style="width:100%;margin-top:.2cm;margin-bottom:.2cm;" >
          <div class="col-md-4">
            <div style="background-color:white;width:100%;height:40px;">
              <div style="background-color:#007fad;width:5%;height:100%;float:left;">&nbsp;&nbsp;</div>
              <div style="width:20%;height:100%;float:left;">
               <center> <i  class="glyphicon glyphicon-calendar" style="margin-top:.3cm;"></i></center> 
              </div>
              <div style="width:75%;height:100%;float:left;" >
                <span class="btn-horus__type js-btn-calendar-type">تسجيل الدخول</span>
                <br/> 
               <input class="form-control Fromdate"  type="text" value="2012-06-15 14:45" style="height:20px;border:0;background-color:white;"  readonly>       
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div style="background-color:white;width:100%;height:40px;" class="trigger1">
              <div style="background-color:#f48f00;width:5%;height:100%;float:left;">&nbsp;&nbsp;</div>
              <div style="width:20%;height:100%;float:left;">
               <center> <i  class="glyphicon glyphicon-calendar" style="margin-top:.3cm;"></i></center> 
              </div>
              <div style="width:75%;height:100%;float:left;">
                <span class="btn-horus__type js-btn-calendar-type">تسجيل الخروج</span>
                <br/>
                <input class="form-control Todate"  type="text" value="2012-06-20 14:45" style="height:20px;border:0;background-color:white;"  readonly>        
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="dropdown" style="width:100%;height:40px;" >
              {!!Form::select('Type', ([null => 'اختار نوع القاعه']+$types->toArray()) ,null,['class'=>'form-control btn btn-default dropdown-toggle','id' => 'Type','style'=>'height:100%;'])!!}
    
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
    <div class="row" style="background-color:#ebeced;">
      <div class="container">
        <div class="row" style="margin-top:.5cm;">
          <div class="col-md-9" >
            <div class="col-md-12" id="partial">
               @include('halls.particalview',$stats)
            </div>
          </div>
          <div class="col-md-3">
            <div style="width:100%;height:80px;background-color:white;background-image: url(//ie2.trivago.com/images/layoutimages/content/map-access.jpg);background-size: 100%;border:8px solid white;">
              <center>
                <div style="border:1px solid black;background-color:white;width:40%;height:40px;margin-top:.3cm;">
                  <h5 style="color:black;"><b>الذهاب الى الخريطه</b></h5>
                </div>
              </center>
            </div>
            <div style="width:100%;background-color:white;margin-top:.3cm;">
              <ul class="nav nav-tabs">
                <li class="nav active"><a href="#A" data-toggle="tab"><h5 style="color:black;"><b>To Filters</b></h5></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane fade in active"style="margin-left:10px;margin-top:.2cm;"  id="A">          
                    <section class="fl-group clearfix moz-no-select" id="fg_stars">
                      <h5 id="fg_stars_heading" class="fl-group__hdl moz-text-select">التقيم</h5>         
                      <div class="fl-group__btn-group clearfix">
                        <!-- action for one star -->
                        <button style="height:40px;border:1px solid #f6ab3f;background-color:white;"class="fl-group__btn fl-group__btn--stars fl-group__btn--stars-1 pointer checked js_box btn--reset" title="0/ 1 star hotels" data-field="1" tabindex="-1">
                          <span class="icon-ic fl-group__btn-icn icon-center moz-no-select">
                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" tabindex="-1" width="28" height="12" viewBox="0 0 28 12">
                              <g fill="none" fill-rule="evenodd">
                                  <path d="M.56 4.673c-.28.047-.493.26-.547.534-.053.28.074.553.314.7L3.2 7.627 2.033 11.12c-.093.28.007.593.254.76.113.08.246.12.38.12.147 0 .293-.047.413-.147L6 9.52l2.92 2.333c.12.1.267.147.413.147.134 0 .267-.04.38-.12.167-.113.267-.293.28-.48l-7.12-7.113-2.313.386m11.427.534c-.054-.274-.267-.487-.547-.534l-3.6-.6L6.634.453C6.54.187 6.287 0 6 0c-.287 0-.54.187-.634.453L4.494 3.08l4.453 4.46 2.726-1.633c.24-.147.367-.42.314-.7" class="svg-color--secondary" fill="#f6ab3f"></path>
                                  <path class="svg-color--primary" fill="#f6ab3f" d="M27.157 4.676l-3.604-.6-1.206-3.62C22.257.183 22 0 21.714 0c-.287 0-.54.184-.633.455l-1.204 3.62-3.604.6c-.275.047-.492.26-.544.534-.052.273.072.55.312.694l2.875 1.725-1.164 3.492c-.094.28.008.588.25.758.115.08.25.12.38.12.15 0 .296-.05.418-.146l2.917-2.333 2.917 2.335c.123.097.27.146.417.146.133 0 .266-.04.38-.12.24-.17.344-.476.25-.756L24.516 7.63l2.876-1.725c.24-.143.365-.42.314-.696-.053-.276-.27-.49-.546-.535z"></path>
                              </g>
                            </svg>
                          </span>
                        </button>
                        <!-- action for two star -->
                        <button style="height:40px;border:1px solid #f6ab3f;background-color:white;" class="fl-group__btn fl-group__btn--stars fl-group__btn--stars-2 pointer checked js_box btn--reset" title="2 star hotels" data-field="2" tabindex="-1">
                          <span class="icon-ic fl-group__btn-icn icon-center moz-no-select">
                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" tabindex="-1" width="28" height="12" viewBox="0 0 28 12">
                              <path d="M11.443 4.676l-3.604-.6L6.63.456C6.542.182 6.287 0 6 0s-.542.184-.633.455L4.16 4.075l-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.198 7.63l-1.164 3.493c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.145L6 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm16 0l-3.604-.6-1.21-3.62C22.542.182 22.287 0 22 0s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L19.2 7.63l-1.165 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L22 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L24.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535z" class="svg-color--primary" fill="#f6ab3f" fill-rule="evenodd"></path>
                            </svg>
                          </span>
                        </button>
                        <!-- action for three star -->
                        <button style="height:40px;margin-top:2px;border:1px solid #f6ab3f;background-color:white;" class="fl-group__btn fl-group__btn--stars fl-group__btn--stars-3 pointer checked js_box btn--reset" title="3 star hotels" data-field="3" tabindex="-1">
                          <span class="icon-ic fl-group__btn-icn icon-center moz-no-select">
                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" tabindex="-1" width="28" height="26" viewBox="0 0 28 26">
                              <path d="M19.443 4.676l-3.604-.6-1.21-3.62C14.542.182 14.287 0 14 0s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L11.2 7.63l-1.165 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L14 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L16.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm8 14l-3.604-.6-1.21-3.62c-.09-.272-.344-.456-.63-.456-.288 0-.543.184-.634.455l-1.206 3.62-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694l2.874 1.725-1.164 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L22 23.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L24.8 21.63l2.878-1.725c.24-.143.363-.42.312-.696-.054-.276-.27-.49-.547-.535zm-16 0l-3.604-.6-1.21-3.62C6.543 14.183 6.288 14 6 14s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.2 21.63 2.034 25.12c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L6 23.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 21.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535z" class="svg-color--primary" fill="#f6ab3f" fill-rule="evenodd"></path>
                            </svg>
                          </span>
                        </button>
                        <!-- action for four star -->
                        <button style="height:40px;border:1px solid #f6ab3f;background-color:white;" class="fl-group__btn fl-group__btn--stars fl-group__btn--stars-4 pointer checked js_box btn--reset" title="4 star hotels" data-field="4" tabindex="-1">
                          <span class="icon-ic fl-group__btn-icn icon-center moz-no-select">
                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" tabindex="-1" width="28" height="27" viewBox="0 0 28 27">
                              <path d="M11.443 4.676l-3.604-.6L6.63.456C6.542.182 6.287 0 6 0s-.542.184-.633.455L4.16 4.075l-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.198 7.63l-1.164 3.493c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.145L6 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm16 0l-3.604-.6-1.21-3.62C22.542.182 22.287 0 22 0s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L19.2 7.63l-1.165 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L22 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L24.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm0 15l-3.604-.6-1.21-3.62c-.09-.272-.344-.456-.63-.456-.288 0-.543.184-.634.455l-1.206 3.62-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694l2.874 1.725-1.164 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L22 24.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L24.8 22.63l2.878-1.725c.24-.143.363-.42.312-.696-.054-.276-.27-.49-.547-.535zm-16 0l-3.604-.6-1.21-3.62C6.543 15.183 6.288 15 6 15s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.2 22.63 2.034 26.12c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L6 24.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 22.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535z" class="svg-color--primary" fill="#f6ab3f" fill-rule="evenodd"></path>
                            </svg>
                          </span>
                        </button>
                        <!-- action for five star -->
                        <button style="height:40px;border:1px solid #f6ab3f;background-color:white;" class="fl-group__btn fl-group__btn--stars fl-group__btn--stars-5 pointer checked js_box btn--reset" title="5 star hotels" data-field="5" tabindex="-1">
                          <span class="icon-ic fl-group__btn-icn icon-center moz-no-select">
                            <svg xmlns="http://www.w3.org/2000/svg" focusable="false" tabindex="-1" width="30" height="30" viewBox="0 0 30 30">
                              <path d="M11.443 4.676l-3.604-.6L6.63.456C6.542.182 6.287 0 6 0s-.542.184-.633.455L4.16 4.075l-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.198 7.63l-1.164 3.493c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.145L6 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm18 0l-3.604-.6-1.21-3.62C24.542.182 24.287 0 24 0s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L21.2 7.63l-1.165 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L24 9.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L26.802 7.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm0 18l-3.604-.6-1.21-3.62c-.09-.272-.344-.456-.63-.456-.288 0-.543.184-.634.455l-1.206 3.62-3.603.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694l2.874 1.725-1.164 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L24 27.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L26.8 25.63l2.878-1.725c.24-.143.363-.42.312-.696-.054-.276-.27-.49-.547-.535zm-18 0l-3.604-.6-1.21-3.62C6.543 18.183 6.288 18 6 18s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L3.2 25.63 2.034 29.12c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L6 27.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L8.802 25.63l2.877-1.725c.24-.143.362-.42.31-.696-.053-.276-.27-.49-.546-.535zm9-9l-3.604-.6-1.21-3.62C15.543 9.183 15.288 9 15 9s-.542.184-.633.455l-1.206 3.62-3.602.6c-.276.047-.493.26-.545.534-.052.273.072.55.312.694L12.2 16.63l-1.165 3.492c-.094.28.01.588.25.758.116.08.25.12.382.12.148 0 .295-.05.417-.146L15 18.52l2.917 2.334c.12.097.268.146.416.146.134 0 .267-.04.382-.12.242-.17.344-.477.25-.757L17.8 16.63l2.878-1.725c.24-.143.363-.42.312-.696-.054-.276-.27-.49-.547-.535z" class="svg-color--primary" fill="#f6ab3f" fill-rule="evenodd"></path>
                            </svg>
                          </span>
                        </button>
                      </div>
                    </section>
                    <div class="row">
                      <hr class="col-md-12"/>
                    </div>
                    <div class="row" style="margin-left:5px;margin-top:.1cm;">
                      <h5 style="color:#007fad;"><b>المحافظه</b></h5> 
                      <div class="col-md-11">
                        {!!Form::select('Government', ([null => 'اختار المحافظه'] + $Government->toArray()) ,null,['class'=>'form-control','id' => 'Government'])!!}
                      </div>
                    </div>
                    <div class="row">
                      <hr class="col-md-12"/>
                    </div>
                    <div class="row" style="margin-left:5px;margin-top:.1cm;">
                      <h5 style="color:#007fad;"><b>المركز</b></h5> 
                      <div class="col-md-11">
                        {!!Form::select('District', ([null => 'اختار المركز'] + $District->toArray()) ,null,['class'=>'form-control','id' => 'District'])!!}
                      </div>
                    </div>
                    <div class="row">
                      <hr class="col-md-12"/>
                    </div>
                    <div class="row" style="margin-left:5px;margin-top:.1cm;">
                      <h5 style="color:#007fad;"><b>السعر</b></h5>  
                    </div>
                    <div class="row" style="margin-top:.1cm;">
                      <center>
                        <h5 style="color:#007fad;">max:$<span id="avragprice">{{$MaxPrice}}</span></h5>
                      </center> 
                    </div>
                    <div class="row">
                      <h6 style="color:black;float:left;margin-left:10px;">${{$MinPrice}}</h6>  
                      <h6 style="color:black;float:right;margin-right:20px;" >${{$MaxPrice}}</h6> 
                    </div>
                    <div class="row">
                      <div class="col-md-11" >
                        <div class="range range-success">
                          <input type="range" id="rangeprice" name="range" min="{{$MinPrice}}" max="{{$MaxPrice}}" value="{{$MaxPrice}}" onchange="changeprice(this)">
                          <output id="rangesuccess">{{$MaxPrice}}</output>
                        </div>
                      </div>
                      <div class="col-md-1" >
                      </div>
                    </div>
                    <div class="row">
                      <hr class="col-md-12"/>
                    </div>
                    <div class="row" style="margin-left:5px;margin-top:.1cm;">
                      <h5 style="color:#007fad;"><b>السعه</b></h5>  
                    </div>
                    <div class="row" style="margin-top:.1cm;">
                      <center>
                        <h5 style="color:#007fad;">max:$<span id="avargeCap">{{$MaxCapcity}}</span></h5>
                      </center> 
                    </div>
                    <div class="row">
                      <h6 style="color:black;float:left;margin-left:10px;">${{$MinCapcity}}</h6>  
                      <h6 style="color:black;float:right;margin-right:20px;" >${{$MaxCapcity}}</h6> 
                    </div>
                    <div class="row">
                      <div class="col-md-11" >
                        <div class="range range-warning">
                          <input type="range" id="rangecap" name="range" min="{{$MinCapcity}}" max="{{$MaxCapcity}}" value="{{$MaxCapcity}}" onchange="changecap(this)">
                          <output id="rangeWarning">{{$MaxCapcity}}</output>
                        </div>
                      </div>
                      <div class="col-md-1" >
                      </div>
                    </div>
                    <div class="row">
                      <hr class="col-md-12"/>
                    </div>
                    <div class="row" style="margin-left:5px;margin-top:.1cm;">
                      <h5 style="color:#007fad;"><b>الامكنيات</b></h5>  
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        @foreach($Facilities as $Facility)
                          <div  style="float:left;margin-left:8px;margin-bottom:10px;width:20%;height:50px;">
                            <div style="border: 1px solid black;width:100%;" onclick="changefilter({{$Facility->id}})">
                             <center><i class="{{$Facility->class}}" style="padding:10px 10px 10px 10px;"></i></center> 
                            </div>
                            <center><p>{{$Facility->Name}}</p></center>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div> 
                </div>  
              </div>
            </div>
        </div>
      </div>
    </div>        
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
    
   
    <script src="assets/js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
 <script>
 function changefilter(id)
 {
    $.ajax({
            type: "POST",
            url: '/changeFacilty',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'id':id

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
 }
 function changeprice(rang)
 {
  $('#avragprice').html(rang.value);
  $('#rangesuccess').val(rang.value);
  $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
 }
 function changecont(count)
 {
   $.ajax({
            type: "POST",
            url: '/changecont',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val(),
            'count':count
          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
 }

 function changecap(rang)
 {
  $('#avargeCap').html(rang.value);
  $('#rangeWarning').val(rang.value);
  $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
 }

  $( function() {
    $("#Type").on('change',function(){
   
     $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
    });

   $('.Fromdate').datetimepicker({
        //language:  'fr',
        format: 'yyyy-mm-dd hh:ii:ss',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    }) .on("changeDate", function(e) {
       $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
    });
    $('.Todate').datetimepicker({
        //language:  'fr',
        format: 'yyyy-mm-dd hh:ii:ss',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
        showMeridian: 1
    }) .on("changeDate", function(e) {
       $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
    });


    $('#Government').on('change', function() {
   $.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });  });
 $('#District').on('change', function() {
$.ajax({
            type: "POST",
            url: '/changeAll',
            dataType: 'json',
            data: {'_token':$('#token').val(),
            'Price':$('#rangeprice').val(),
            'Capcity':$('#rangecap').val(),
            'Type':$('#Type').val(),
            'fromdate':$('.Fromdate').val(),
            'todate':$('.Todate').val(),
            'Government':$('#Government').val(),
            'District':$('#District').val()

          },
            success: function(data) {   
                $('#partial').empty();
                $('#partial').append(data['html']);
             }
        });
  });
     

         
      });

     
  </script>
</body>
</html>
