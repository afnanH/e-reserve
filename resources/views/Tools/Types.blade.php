@extends('master')
@section('content')
<!DOCTYPE html>

<meta name="csrf-token" content="{{ csrf_token() }}" />

<section class="panel panel-primary">
  <div class="panel-body">

    <h1 dir="rtl"> نوع المكان </h1>
<div>
   {!! Form::open(['action' => "TypesController@store",'method'=>'post','id'=>'profileForm']) !!} 
    <div>
      <label>الاسم</label>
      <input type="text" name="txtName">
       <button type="submit"  name="submitButton" class="btn btn-info"  >حفظ </button>  
    </div>
       {!!Form::close()!!}
</div>
   

    <table class="table table-hover table-bordered  dt-responsive nowrap display tasks" cellspacing="0" width="100%" dir="rtl">
      <thead>
          <th>العدد </th>
          <th> الاسم </th>
          <th></th>
                   
      </thead>
      <tfoot>
        <th></th>
        <th> الاسم</th>
        <th> </th>
              
      </tfoot>               

      <tbody style="text-align:center;">
        <?php $i=1;?>
        @foreach($types as $type)
          <tr>
            <td>{{$i++}} </td> 
            <td><a  class="testEdit" data-type="text" data-name="Name"  data-pk="{{ $type->id }}">{{$type->Name}}</a></td>
            <td><a href="/Types/destroy/{{$type->id}}"class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-trash"></span>  </a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
  


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


  <script type="text/javascript">

var editor;

  $(document).ready(function(){

    $('#profileForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'name': {
                    validators: {
                            remote: {
                        url: '/checknamecategory',
                        
                        message: 'الاسم موجود من قبل ',
                        type: 'GET'
                    },
                      regexp: {
                        regexp: /^[\u0600-\u06FF\s0-9\_]+$/,
                        message: 'يجب ادخال حروف عربي وارقام فقط'
                    },

             notEmpty:{
                    message:"يجب ادخال الأسم "
                  }
                  }
                },
                     'EngName': {

                    validators: {
                            remote: {
                        url: '/checkEnglishnamecategory',
                      
                        message: 'الاسم موجود من قبل ',
                        type: 'GET'
                    }, 

             // notEmpty:{
             //        message:"يجب ادخال الاسم "
             //      },
                    regexp: {
                        regexp: /^[a-zA-Z\s0-9\_]+$/,
                        message: 'يجب ادخال حروف انجليزيه وارقام فقط '
                    }
                        
                    }
                }
            } ,submitHandler: function(form) {
        form.submit();
    }
        })
        .on('success.form.fv', function(e) {
    // e.preventDefault();
    var $form = $(e.target);

    // Enable the submit button
   
    $form.formValidation('disableSubmitButtons', false);
   

});
        // Add button click handler
    

        // Remove button click handler
    
//Doaa Elgheny

//End Doaa Elgheny
     var table= $('.tasks').DataTable({
  
    select:true,
    responsive: true,
    "order":[[0,"asc"]],
    'searchable':true,
    "scrollCollapse":true,
    "paging":true,
    "pagingType": "simple",
      dom: 'lBfrtip',
        buttons: [
           
            
            { extend: 'excel', className: 'btn btn-primary dtb' }
            
            
        ],

fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
$.fn.editable.defaults.send = "always";

$.fn.editable.defaults.mode = 'inline';

$('.testEdit').editable({

      validate: function(value) {
        name=$(this).editable().data('name');
        if(name=="Name")
        {
                if($.trim(value) == '') {
                    return 'يجب ادخال القيمة .';
                  }
        }
                  if(name=="Name")
        {

           var regexp = /^[\u0600-\u06FF\s0-9\_]+$/;          

           if (!regexp.test(value)) 
           {
                return 'هذا الادخال غير صحيح.';
           }
            
         } 
            if(name=="EngName")
        {

           var regexp = /^[a-zA-Z\s0-9\_]+$/;          

           if (!regexp.test(value)) 
           {
                return 'هذا الادخال غير صحيح.';
           }
            
         }
      
        },

    placement: 'right',
    url:'{{URL::to("/")}}/updateTypes',
  
     ajaxOptions: {
     type: 'get',
    sourceCache: 'false',
     dataType: 'json'

   },

       params: function(params) {
            // add additional params from data-attributes of trigger element
            params.name = $(this).editable().data('name');

            // console.log(params);
            return params;
        },
        error: function(response, newValue) {
            if(response.status === 500) {
                return 'This Data Already Exist,Enter Correct Data.';
            } else {
                return response.responseText;
            }
        }
        ,    success:function(response)
        {
            if(response.status==="You do not have permission.")
             {
              return 'You do not have permission.';
              }
        }


});

}
});

 



   $('.tasks tfoot th').each(function () {



      var title = $('.tasks thead th').eq($(this).index()).text();
               
 if($(this).index()>=1 && $(this).index()<=2)
        {

           $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
}
        

    });
  table.columns().every( function () {
  var that = this;
 $(this.footer()).find('input').on('keyup change', function () {
          that.search(this.value).draw();
            if (that.search(this.value) ) {
               that.search(this.value).draw();
           }
        });
      
    });


 });
 //Ola Shaban 14-06-2017 //Comment
    
  </script>
  <script>
    //End Function 
  </script>
@stop
