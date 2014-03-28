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
//    var optionsContactSubmit = 
//            {
//                success:       showResponseFormContact,   
//                type:      'POST',        
//                clearForm: true,    
//                resetForm: true,        
//                delegation: true
//            };
//    
//    $('#formContact').ajaxForm(optionsContactSubmit); 
});

// post-submit callback 
//function showResponseFormContact(responseText, statusText, xhr, $form)  { 
//    $("#containerFormContact").append(responseText);
//}

//function checkFormContactText(){
//    
//   $('input[type="text"], textarea').change(function(){
//      var value = $(this).val();
//      if(value.trim() !== ""){
//          $(this).parent().children('img[name="check"]').removeClass('hide');
//          $(this).parent().children('img[name="erreur"]').addClass('hide');
//      }
//      if(value.trim() === ""){
//          $(this).parent().children('img[name="erreur"]').removeClass('hide');
//          $(this).parent().children('img[name="check"]').addClass('hide');
//      }
//   });
//}
//
//function checkInputRadio(){
//    
//    $("input:radio").change(function(){
//        var valueCivilite = $(this).val();
//        if((valueCivilite === 1) || (valueCivilite === 0)){
//            
//        }
//    });
//    
//}
//$(function(){
//   checkFormContactText(); 
//   checkInputRadio();
//});

