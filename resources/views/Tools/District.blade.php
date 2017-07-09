@extends('master')
@section('content')
<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<section class="panel panel-primary">
  <div class="panel-body">

    <h1><i class='fa fa-tasks'></i> Districts </h1>
    @if($showadditem==1) 
     <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" style="margin-bottom: 20px;"> Add New District </a>
 @endif 

    <table class="table table-hover table-bordered  dt-responsive nowrap display tasks" cellspacing="0" width="100%">
      <thead>
          <th>No</th>
          <th>Name</th>
          
           <th>Government Name</th>
         
          <th>Process</th>          
      </thead>
      <tfoot>
        <th></th>
        <th>Name</th>
      
        <th>Government Name</th>
          
        <th>Process</th>        
      </tfoot>               

      <tbody style="text-align:center;">
        <?php $i=1;?>
        @foreach($districts as $district)
          <tr>
            <td>{{$i++}}</td>   
            <td><a  class="testEdit" data-type="text" data-name="Name" data-value="{{$district->Name}}" data-pk="{{ $district->id }}">{{$district->Name}}</a></td>
           
            

          <td>

 <a class="testEdit" data-type="select"  data-value="{{$district->districtgovernment->Name}}" data-source ="{{$governments}}" data-name="government_id"  data-pk="{{$district->id}}"> 
 {{$district->districtgovernment->Name}}
  
  </a>
 </td>


            <td><a href="/Districts/destroy/{{$district->id}}"class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-trash"></span>  </a></td>
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
                'Name': {
                  
                    validators: {
                            remote: {
                        url: '/checknameDistric',
                        
                        message: 'The Distric name is Already exist',
                        type: 'GET'
                    },

             notEmpty:{
                    message:"the name is required"
                  },
                    regexp: {
                        regexp: /^[\u0600-\u06FF\s]+$/,
                        message: 'The full name can only consist of alphabetical and spaces'
                    }
                  }
                },
                     'EngName': {
                
                    validators: {
                            remote: {
                        url: '/checkEngNameDistric',
                      
                        message: 'The Distric EngName is Already exist',
                        type: 'GET'
                    }, 

             notEmpty:{
                    message:"the EngName is required"
                  },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The EngName can only consist of alphabetical and spaces'
                    }
                        
                    }
                }
            }  ,submitHandler: function(form) {
        form.submit();
    }
        })
        .on('success.form.fv', function(e) {
   // e.preventDefault();
    var $form = $(e.target);

    // Enable the submit button
   
    $form.formValidation('disableSubmitButtons', false);
})
        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#emailTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $email    = $clone.find('[name="email[]"]').appendTo('s');

            // Add new field
            $('#profileForm').formValidation('addField', $email);
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row   = $(this).closest('.form-group'),
                $email = $row.find('[name="email[]"]');

            // Remove element containing the email
            $row.remove();

            // Remove field
            $('#profileForm').formValidation('removeField', $email);
        });
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
         if(name=="Name"||name=="EngName")
        {
                if($.trim(value) == '') {
                    return 'Value is required.';
                  }
        }
          if(name=="Name")
        {

           var regexp = /^[\u0600-\u06FF\s]+$/;          

           if (!regexp.test(value)) 
           {
                return 'This field is not valid';
           }
            
         } 
            if(name=="EngName")
        {

           var regexp = /^[a-zA-Z\s]+$/;          

           if (!regexp.test(value)) 
           {
                return 'This field is not valid';
           }
            
         }
      
        },

    placement: 'right',
    url:'{{URL::to("/")}}/updateDistrict',
  
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
               ,
        success:function(response)
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
               
 if($(this).index()>=1 && $(this).index()<=6)
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

  </script>
@stop
