/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function(){
    
    $('#formContact textarea, #formContact input[type="text"], #formContact input[type="email"]').focus(function(){
        $(this).css('background-color', '#ffffff');
    });
    
    $('#formContact textarea, #formContact input[type="text"], #formContact input[type="email"]').focusout(function(){
        $(this).css('background-color', '#fafafa');
    });
    
    //Submit
    var optionsContactSubmit = 
            {
                success:       showResponseFormContact,   
                type:      'POST',        
                clearForm: true,    
                resetForm: true,        
                delegation: true
            };
    
    $('#formContact').ajaxForm(optionsContactSubmit); 
});

// post-submit callback 
function showResponseFormContact(responseText, statusText, xhr, $form)  { 
    $("#containerFormContact").html(responseText);
}

function checkFormContactTextNull(elmtCourant){
    
   //$('input[type="text"], input[type="email"], textarea').focusout(function(){
      var value = $(elmtCourant).val();
      if(value.trim() !== ""){
          $(elmtCourant).removeClass('champErreur');
          $(elmtCourant).parent().children('img[name="check"]').removeClass('hide');
          $(elmtCourant).parent().children('img[name="erreur"]').addClass('hide');
         
      }
      if(value.trim() === ""){
          $(elmtCourant).addClass('champErreur');
          $(elmtCourant).parent().children('img[name="erreur"]').removeClass('hide');
          $(elmtCourant).parent().children('img[name="check"]').addClass('hide');
         
      }
   //});
}

function isEmail(elmtCourant)

{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	var isValidate = reg.test($(elmtCourant).val());
        
        if(isValidate === true){
            $(elmtCourant).removeClass('champErreur');
            $(elmtCourant).parent().children('img[name="check"]').removeClass('hide');
            $(elmtCourant).parent().children('img[name="erreur"]').addClass('hide');
        }else{
            $(elmtCourant).addClass('champErreur');
            $(elmtCourant).parent().children('img[name="erreur"]').removeClass('hide');
            $(elmtCourant).parent().children('img[name="check"]').addClass('hide');
        }
}

function checkInputRadio(elmtCourant){
    
    $("input:radio").change(function(){
        var valueCivilite = $(elmtCourant).val();
        if((valueCivilite === "1") || (valueCivilite === "0")){
            $(elmtCourant).parent().children('img[name="erreur"]').removeClass('hide');
            $(elmtCourant).parent().children('img[name="check"]').addClass('hide');
        }
    });
    
}
$(function(){
    
    $(document.body).on('focusout','#formContact input[type="text"], #formContact textarea', function(){
        checkFormContactTextNull(this); 
        checkInputRadio(this);
        return false;
    });
    
    $(document.body).on('focusout','#formContact input[type="email"]', function(){
        isEmail(this);
    });
   
});

