 @extends('masterUser')
@section('content')
<script>
$(document).ready(function() {
    var numOfHalls = 0;
    var hallsID = [];
    @foreach ($hallall as $h)
        hallsID[numOfHalls++] = {{ $h->id }};
    @endforeach
    var counter = 0;
    
    @foreach ($hallall as $h)   
        $('#calendar'+ hallsID[counter]).fullCalendar({ 
            
            events:
            {
                url: "{{ URL::to('GetEvents') }}",
                type: "POST",
                dataType: 'json',
                data: {'id' : hallsID[counter++] ,"_token":$('#_token').val()},
                success: function(response)
                    {
                        console.log("obj " + response.toSource());
                    },
                    error: function(response)
                    {
                        console.log('Error'+response);
                    }
                
            },
        
            header: {
            left: 'title ',
            center: '',
            right: 'month agendaDay prev next'
            },
            editable: false,
            droppable: true,
            
            eventMouseover: function (data, event, view) {

                tooltip = '<div class="tooltiptopicevent" style="color:#fff;width:auto;height:auto;background:#841851;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + 'title ' + ': ' + data.title + '<br/>start:' + moment(data.start).format('DD-MM-YYYY HH:mm') + '<br/>end:' + moment(data.end).format('DD-MM-YYYY HH:mm') +'</div>';


                $("body").append(tooltip);
                $(this).mouseover(function (e) {
                    $(this).css('z-index', 10000);
                    $('.tooltiptopicevent').fadeIn('500');
                    $('.tooltiptopicevent').fadeTo('10', 1.9);
                }).mousemove(function (e) {
                    $('.tooltiptopicevent').css('top', e.pageY + 10);
                    $('.tooltiptopicevent').css('left', e.pageX + 20);
                });


            },
            eventMouseout: function (data, event, view) {
                $(this).css('z-index', 8);

                $('.tooltiptopicevent').remove();

            },
            minTime : '{{ $h->WorkStart }}',
            maxTime : '{{ $h->WorkEnd }}',
            eventLimit: true,
            views: 
            {
                agenda: {
                    eventLimit: 0 
                }
            }
        });
     @endforeach
});
</script>

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







      <section  id ="pricing" class=" section-padding "  >
       <div class="container" style="    margin-top: 40px; ">
        <div class="row">
      <div class="col-md-3 righ" style="border: 1px solid #CCC;">
           <div class="pricing-head" style="margin-bottom: 9px; border-bottom: 2px #ccc solid;">
          <img src="/assets/img/13.jpg" class="img-responsive lama" alt="img25" style="    border-radius: 50%;
    width: 100px;
    margin-top: 20px;

                                                                            height: 90px;">
               <p class="text-center" style="margin-top: 10px;
    font-size: 20px;
    font-weight: bold; "> تيك </p>
               <br>
              </div>


          <div class="pricing-body">

                 <p style="text-align: right;">
                               <i class="fa fa-phone-square" aria-hidden="true" style="  color: #841851;"></i>

                     01118233093 </p>

              <br>
               <p style="text-align: right;">
                        <i class="fa fa-envelope" aria-hidden="true" style="  color: #841851;"></i>
                  Blerd2015@gmail.com </p>
                <br>

                 <p style="text-align: right;">
                 <i class="fa fa-map-marker" aria-hidden="true" style="  color: #841851;"></i>
          جامعة أسيوط -  مبنى شبكة المعلومات - الدور السادس  </p>
              <br>
                    <p style="text-align: right;">
                 <i class="fa fa-map-marker" aria-hidden="true" style="  color: #841851;"></i>
            يعتبر مركز تيك من اكبر واهم    يعتبر مركز تيك من اكبر واهم    يعتبر مركز تيك من اكبر واهم    يعتبر مركز تيك من اكبر واهم    يعتبر مركز تيك من اكبر واهم يعتبر مركز تيك من اكبر واهم  </p>

                <br>


          <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline">


            <div class=" head4">
                                       <div class="lamiaa">



                                  <li> <a href="" target="_blank"><i class="fa fa-facebook"></i></a></li>
             <li> <a href="#"><i class="fa fa-twitter" target="_blank"></i></a></li>


                                                 <li> <a href="#"><i class="fa fa-youtube-square"></i></a></li>

                                     </div>
                                </div>


              </ul>



          </div>








          </div>

          @foreach($hallall as $all)


      <div class="col-md-8 lif" style="border: 1px solid #CCC;    " >

           <div class="head_title text-center " style="    margin-top: 0px;">
                                    <h2 >{{$all->Name}} </h2>


                                </div><!-- End off Head_title -->


             <div class="col-md-5 col-sm-5">
            <div class="">
              <!-- Plan  -->












              <div class="rightimg" style="
   ">
                  <img src="/assets/img/12.jpg" class="img-responsive" alt="img25">
                     @foreach ($all->GetFacilities as $value)
   <div class="rightimg" style="">
<!--   <li>{{$value->Name}}</li> -->
 <div  style="float:left;margin-left:8px;margin-bottom:10px;width:20%;height:50px;">
                            <div style="width:100%;" onclick="changefilter({{$value->id}})">
                             <center><img src="{{$value->Image}}"></center>
                            </div>

                          </div>
   </div>
  @endforeach


              </div>


            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <!-- Plean Detail -->
              <div class="  fli mart-15"  style="
         margin-right: -30px;

 ">

                  <p style="    text-align: center;
    margin-top: 9px; font-size: 18px;
    font-weight: bold;">

                      <i class="fa fa-money" aria-hidden="true" style="    color: #841851;
    font-size: 30px;
    margin-right: 5px;
    margin-left: 5px;"></i>

                      <br>
                    {{$all->Price}} جنية



          </p>
                  <br>
                  <br>

                  <p style="   text-align: center;
    margin-top: 9px; font-size: 18px;
    font-weight: bold;"><i class="fa fa-users" aria-hidden="true" style="    color: #841851;
    font-size: 30px;
    margin-right: 5px;
    margin-left: 5px;"></i>
                      <br>
                  {{$all->Capacity}} فرداً


                  </p>

              </div>
          </div>



                                 <div class="col-md-5">
                                    <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
                                    <div id = "calendar{{ $all->id }}"></div>
                                    <br/><br/>
                                  </div>

















          </div>

   @endforeach


           </div>
          </div>


<div id="eventContent" title="Event Details" style="display:none;">
    Start: <span id="startTime"></span><br>
    End: <span id="endTime"></span><br><br>
    <p id="eventInfo"></p>
    <p><strong><a id="eventLink" href="" target="_blank">Read More</a></strong></p>
</div>


      </section>





<br/>


  @stop