
@extends('master')
@section('content')

@if(Session::has('flash_message'))
    <div class="alert alert-info">
        {{ Session::get('flash_message') }}
    </div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>




<section class="panel panel-primary">
  <div class="panel-body" dir="rtl">
    <div class="container">
        <div class = "row">
                <div class = "col-sm-5" style = "float:left;margin-top:2%">
                    <button type="button" class="btn btn-info btn-lg" onclick="window.location='{{ url("create") }}'">Add New Event</button>
                </div>
                <div class = "col-sm-7">
                    <h2 > القاعات </h2>
                </div>
            </div>

    @foreach($hall as $all)
       <h2>{{$all->Name}} </h2>
       <script>
         
            $(document).ready(function() {
                var numOfHalls = 0;
                var hallsID = [];
                @foreach ($hall as $h)
                    hallsID[numOfHalls++] = {{ $h->id }};
                @endforeach
                var counter = 0;
             @foreach ($hall as $h)
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
                        left: ' prev next',
                        center: 'title',
                        right: 'month agendaWeek agendaDay '
                        },
                        defaultView: 'month',
                         dayClick: function(date, allDay, jsEvent, view) {
                            if (view.name === "month") {
                                $('#calendar'+ hallsID[counter]).fullCalendar('gotoDate', date);
                                $('#calendar'+ hallsID[counter]).fullCalendar('changeView', 'agendaDay');
                            }
                        },
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
        <div id = "calendar{{ $all->id }}" style = "width:800px;height:800px"></div>
    @endforeach
    <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
    </div>   
  </div>
</section>
  
@stop



