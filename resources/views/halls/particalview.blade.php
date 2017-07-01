
     @foreach ($stats as $stat)

        <div style="width:100%;height:200px;background-color:white;margin-top:.5cm;">
             <div style="width:30%;height:100%;float:left;">
                <center>
                    <div style="color:#66a400;margin-left:10px;padding: 30px 30px 30px 30px;">
                      <h3>${{$stat->Price}}</h3>
                    </div>
                    <div style="background-color:#66a400;height:50px;width:95%;margin-top:.5cm;">
                      <center>
                       <a href="/Halls/{{$stat->id}}" style="text-decoration:none;"> <h4 style="color:white;padding: 12px 12px 12px 12px;">  تفاصيل المكان  &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-menu-left"></i></h4></a>
                      </center>
                    </div>
                </center>
            </div>
            <div style="width:70%;height:100%;float:left;">
                <div style="height:100%;width:60%;float:left;">
                  <div dir="rtl" style="padding: 5px 5px 5px 0px;">
                    <h3 style="color:#37454d; "><b>{{$stat->Name}}</b></h3>
                    <h6>Istanbul, 0.2 km to City centre</h6>
                    <h6>Istanbul, 0.2 km to City centre</h6>
                  </div>
                </div>
                <div style="height:100%;width:40%;padding: 5px 5px 5px 5px;float:left;">
                    <img src="/assets/dist/img/13342906_1052235511525266_1187095352577510568_n.jpg" style="height:100%;width:100%;">
                </div>
            </div>
        </div>
     @endforeach
      <div class="col-md-12">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            @for ($i=1;$i < ($pagecount+1);$i++)
            <li class="page-item" ><a class="page-link" onclick="changecont({{$i}})">{{$i}}</a></li>
            @endfor
          </ul>
        </nav>
      </div>
