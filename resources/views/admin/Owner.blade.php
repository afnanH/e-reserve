@extends('masterUser')
@section('content')

<div class="col-md-12 ">
<br/>
<br/>
<br/>
<br/>

  <fieldset class="the-fieldset">

                            <legend class="the-legend">بيانات المكان</legend>
  {!!Form::open(['route' =>[ 'Owner.update',1],'method' => 'put','id'=>'profileForm'])!!}
                            <div class="col-sm-5 col-sm-offset-1">
                            
                                       
       
        
                         <div class="col-sm-12 col-sm-offset-1">
      <p>اسم المكان</p>
      <span class="icon-case"><i class="fa fa-home"></i></span>
        <input type="text" name="PlaceName" id="PlaceName" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
                <div class="validation"></div>
      </div>

                      
      <div class="col-sm-12 col-sm-offset-1">
      <p>عنوان المكان </p>
      <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
        <input type="text" name="adress" id="adresse" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Adresse' doit être renseigné."/>
                <div class="validation"></div>
      </div>       
                            
                           
                            
                            
           

      <div class="col-sm-12 col-sm-offset-1">
      <p>عن المكان</p>
      <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <textarea name="Desc" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                <div class="validation"></div>
      </div>
    
                            
                            
                            </div>   
                            
                            
                            <div class="col-sm-5 col-sm-offset-1">
                            
                             <div class="col-sm-12 col-sm-offset-1 wizard-card">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" id="wizard-picture">
                                          </div>

                                          <h6 class="hh6">صورة اللوجو</h6>
                                      </div>
                                  </div>     
                            
                            
                            </div> 
 
                        </fieldset>


                        <fieldset class="the-fieldset">
                            <legend class="the-legend"> مسؤل المكان</legend>
                           
            <div class="col-sm-3 col-sm-offset-1">
      <p>الإسم</p>
      <span class="icon-case"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input type="text" name="OwnerName" id="ville" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné."/>
                <div class="validation"></div>
      </div>  
                            
               
                           
                            
            
              <div class="col-sm-3 col-sm-offset-1">
      <p>رقم التليفون</p> 
      <span class="icon-case"><i class="fa fa-phone"></i></span>
        <input type="text" name="TelOwner" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                <div class="validation"></div>
      </div>
                
                <div class="col-sm-3 col-sm-offset-1">
      <p>البريد الإلكترونى </p> 
      <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="email" name="EmailOwner" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>  
    
        
                            
                            
                            
                        </fieldset>
                  
  
                        
       
                        <fieldset class="the-fieldset">
                            <legend class="the-legend"> بيانات التواصل</legend>
                      
                            
                            <div class="col-sm-5 col-sm-offset-1">
                            
                            
                              <div class="col-sm-12 col-sm-offset-1">
      <p>تليفون 1</p> 
      <span class="icon-case"><i class="fa fa-phone"></i></span>
        <input type="text" name="phone1" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                <div class="validation"></div>
      </div>
                            <div class="col-sm-12 col-sm-offset-1">
      <p>تليفون 2</p> 
      <span class="icon-case"><i class="fa fa-phone"></i></span>
        <input type="text" name="phone2" id="phone2" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                <div class="validation"></div>
      </div>
                              <div class="col-sm-12 col-sm-offset-1">
      <p>البريد الإلكترونى </p> 
      <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>  
                            
                     <div class="col-sm-12 col-sm-offset-1">
      <p> صفحة الفيسبوك </p>  
                    <span class="icon-case"><i class="fa fa-facebook"></i></span>
                <input type="text" name="FaceBook" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>
        
      <div class="col-sm-12 col-sm-offset-1">
      <p>لينك الموقع </p> 
                    <span class="icon-case"><i class="fa fa-facebook"></i></span>
                <input type="text" name="WebSite" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>
        
    <div class="col-sm-12 col-sm-offset-1">
      <p> صفحةاليوتيوب  </p>  
                    <span class="icon-case"><i class="fa fa-youtube" aria-hidden="true"></i></span>
                <input type="text" name="youtube" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>
        <div class="col-sm-12 col-sm-offset-1">
      <p> صفحة تويتر </p> 
                    <span class="icon-case"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                <input type="text" name="Twitter" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
      </div>
               
                            
                            
                          
                            
                            
                            </div>
                            
                                <div class="col-sm-5 col-sm-offset-1">
                            
                            
                          <div class="col-sm-12 col-sm-offset-1">
      <p>حدد مكانك </p> 
          <iframe class="actAsDiv"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=Asyut%2CEl-Gomhoreya%2C%20Assiut%20Governorate&amp;aq=0&amp;ie=UTF8&amp;t=m&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe>
      </div>  
                            
                            
                            </div>
                            
                     
                            
    </fieldset>


</div>



<div class="col-md-12">

<div class="col-md-6">
 <p> <a href="/Owner" class="btn btn-blue btn-effect">رجوع</a> </p>
 </div>

<div class="col-md-6">
  <button type="submit"  name="submitButton" class="btn btn-green btn-effect"  >تسجيل </button>   
</div>
 
</div>
{!!Form::close() !!}
</div>


       @stop