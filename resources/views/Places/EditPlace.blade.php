@extends('master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<section class="panel panel-primary">
<div class="panel-body">               
{!!Form::open(['route' =>['PlaceData.update',$placedetails->id],'method' => 'put','id'=>'profileForm'])!!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id" name="id" value="{{$placedetails->id}}">

                 <div class="col-md-12" dir="rtl">
               
                <div class="col-md-9"> 
                    <input type="text" class="form-control" id="Name" name="Name" value="{{$placedetails->Name}}" placeholder="enter Name" required>
                </div>
                 <label for="input_product" class="control-label col-md-3">الاسم</label>
           </div>

              <div class="col-md-12" dir="rtl">
               
                <div class="col-md-9"> 
                    <input type="text" class="form-control" id="Name" name="address" value="{{$placedetails->Address}}" placeholder="enter Address" >
               </div>
                <label for="input_product" class="control-label col-md-3">العنوان</label>
            </div>

             <div class="col-md-12" dir="rtl">
               
                <div class="col-md-9">  
              <input type="text" class="form-control" id="Name" name="Tele" value="{{$placedetails->Tele}}" placeholder="enter Tele" >
           </div>
            <label for="input_product" class="control-label col-md-3">تليفون1</label>
           </div>


       <div class="col-md-12" dir="rtl">
              
                <div class="col-md-9"> 
              <input type="text" class="form-control" id="Name" name="Tele2" value="{{$placedetails->Tele2}}" placeholder="enter Tele2" >
           </div>
             <label for="input_product" class="control-label col-md-3">تليفون2</label>
          </div>


              <div class="col-md-12" dir="rtl">
              
                <div class="col-md-9" > 
                    <input type="text" class="form-control" id="Name" name="Email" value="{{$placedetails->Email}}" placeholder="enter Email" >
                </div>
              
                	<label for="input_product" class="control-label col-md-3" dir="rtl">الايميل</label>
            
                  
           </div>

<h3 dir="rtl">بيانات المسؤل</h3>
               <div class="col-md-12" dir="rtl">
                
                <div class="col-md-9" dir="rtl">
               <input type="text" class="form-control" id="Name" name="OwnerName" value="{{$placedetails->OwnerName}}" placeholder="enter OwnerName" >
           
               </div>
               <label for="input_product" class="control-label col-md-3">اسم المسؤل</label>
            </div>
            <div class="col-md-12">
                
                <div class="col-md-9"> 
                 <input type="text" class="form-control" id="Name" name="EmailOwner" value="{{$placedetails->EmailOwner}}" placeholder="enter EmailOwner" >
                </div>
                <label for="input_product" class="control-label col-md-3" dir="rtl">الايميل</label>
           </div>
              <div class="col-md-12" dir="rtl">
                
                <div class="col-md-9"> 
                    <input type="text" class="form-control" id="Name" name="TelOwner" value="{{$placedetails->TelOwner}}" placeholder="enter  TelOwner" >
               </div>
               <label for="input_product" class="control-label col-md-3"> التليفون</label>
            </div>
<h3  dir="rtl"> بيانات التواصل</h3>
            <div class="col-md-12" dir="rtl">
                
                <div class="col-md-9"> 
                           <input type="text" class="form-control" id="Facebook_Account" name="Facebook" value="{{$placedetails->Facebook}}" placeholder="enter Eng Facebook" >
                </div>
                <label for="input_product" class="control-label col-md-3">صفحة الفيس</label>
           </div>
              <div class="col-md-12" dir="rtl">
                
                <div class="col-md-9"> 
                    <input type="email" class="form-control" id="Name" name="
Youtube" value="{{$placedetails->Youtube}}" placeholder="enter  Youtube" >
               </div>
               <label for="input_product" class="control-label col-md-3">صفحة اليوتيوب</label>
            </div>

               <div class="col-md-12" dir="rtl">
               
                <div class="col-md-9">
                <input type="text" class="form-control" id="startdate" name="website" placeholder="enter website" value="{{$placedetails->website}}">

                  
                </div>
                 <label for="input_product" class="control-label col-md-3">صفحة الموقع</label>
           </div>
              <div class="col-md-12" dir="rtl">
                
                <div class="col-md-9"> 
                    <input type="Number" class="form-control" id="Name" name="Twitter" value="{{$placedetails->Twitter}}" placeholder="enter Twitter" required>
               </div>
               <label for="input_product" class="control-label col-md-3">صفحة التويتر</label>
            </div>

          
  
         
                       


                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" name="submitButton" class="btn btn-info" >Submit</button>  
                            </div>
                        </div>
                
                  </tr>  
             </table> 
  
          {!!Form::close()!!}


<script type="text/javascript">

  $(document).ready(function(){

     $('#startdate').datepicker({
     language: 'ar',
     format: "yyyy-mm-dd"
});
          $('#Government').change(function(){
        $.get("{{ url('api/newdropdown')}}", 
        { option: $(this).val() }, 
        function(data) {
            $('#district').empty(); 
            $.each(data, function(key, element) {
                $('#district').append("<option value='" + key +"'>" + element + "</option>");
            });
        });
    });
$('.Government').chosen({
                width: '100%',
                no_results_text:'No Results'
            });
                $(".Government").trigger("chosen:updated");
            $(".Government").trigger("change");
 });
        $('#Has_Facebook').change(function(){
            if($(this).val() == "No")
            {
              $("#Facebook_Account").attr("disabled","disabled");
            }
    });
         $('#profileForm')
         .find('[name="Government"]')
        
            .chosen({
                width: '100%',
                inherit_select_classes: true
            })
          .end()
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
              
                  notEmpty:{
                    message:"the contractor name is required"
                  },
                    regexp: {
                        regexp: /^[\u0600-\u06FF\s]+$/,
                        message: 'Name must be arabic'
                    }
                    }
               
                  },
                   'EngName': {
                  
                       validators: {
                
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The English name can only consist of alphabetical and spaces'
                    }
                    }

                    }
                 
                ,'Government':{
                       validators: {
                  notEmpty:{
                    message:"the Governmentis required"
                  }
                    }

                    }
                    ,"Address": {
                  
                       validators: {
                    regexp: {
                        regexp: /^[\\.\/a-zA-Z\u0600-\u06FF0-9\s]+$/,
                        message: 'The Address can only consist of alphabetical and spaces'
                    }
                    }

                    },'Education': {
                  
                       validators: {
                    regexp: {
                        regexp: /^[a-zA-Z\u0600-\u06FF\s]+$/,
                        message: 'The Education can only consist of alphabetical and spaces'
                    }
                    }

                    }
                    ,'Email':{
                  
                       validators: {
                                        remote: {
                        url: '/cemexmarketring/public/checkContractorEmail',
                         data:function(validator, $field, value)
                        {return{id:validator.getFieldElements('id').val()};},
                        message: 'The email is not available',
                        type: 'GET'
                    },
                  emailAddress:{
                    message:"this Email is not valid"
                  }
                    }

                    }
                    ,'Tele1':{
                  
                       validators: {
                                              remote: {
                        url: '/cemexmarketring/public/checkContractorTel1',
                         data:function(validator, $field, value)
                        {return{id:validator.getFieldElements('id').val()};},
                        message: 'The  Telephone already Exsits',
                        type: 'GET'
                    },
                       regexp: {
                        regexp: /^\d{11}$/,
                        message: 'The Telephone can only consist of numbers and length 11'
                    },
                  notEmpty:{
                    message:"the Telephone is required"
                  }
                    }

                    }
                    ,'Tele2':{
                  
                       validators: {
                                              remote: {
                        url: '/cemexmarketring/public/checkContractorTel2',
                         data:function(validator, $field, value)
                        {return{id:validator.getFieldElements('id').val()};},
                        message: 'The  Telephone is not available',
                        type: 'GET'
                    },   regexp: {
                        regexp: /^\d{11}$/,
                        message: 'The Telephone can only consist of numbers and length 11'
                    },
                                   }

                    }
                        ,'Birthday':
                   {
                      validators: {
                     date: {
                        message: 'The date is not valid',
                        format: 'YYYY-MM-DD',
                        // min and max options can be strings or Date objects
                        min: '1950-01-01',
                        max: '2001-12-30'
                    }
                    }
                }
                    ,'Job':{
                  
                       validators: {
                 regexp: {
                        regexp: /^[a-zA-Z\u0600-\u06FF\s]+$/,
                        message: 'The Job can only consist of alphabetical and spaces'
                    }
                    }

                    },'Nickname':{
                  
                       validators: {
                 regexp: {
                        regexp:/^[a-zA-Z\u0600-\u06FF\s]+$/,
                        message: 'The Nickname can only consist of alphabetical and spaces'
                    }
                    }

                    },'Religion':{
                  
                       validators: {
                 regexp: {
                        regexp: /^[a-zA-Z\u0600-\u06FF\s]+$/,
                        message: 'The Education can only consist of alphabetical and spaces'
                    }
                    }

                    },'Fame':{
                  
                       validators: {
                 regexp: {
                        regexp: /^[a-zA-Z\u0600-\u06FF\s]+$/,
                        message: 'The Fame can only consist of alphabetical and spaces'
                    }
                    }

                    }
                    ,'Home_Phone':{
                  
                       validators: {
                 numeric: {
                        message: 'The Home Phone can only consist of numbers'
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

</script>



</div>
</section>
@stop