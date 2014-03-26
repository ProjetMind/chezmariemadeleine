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
});