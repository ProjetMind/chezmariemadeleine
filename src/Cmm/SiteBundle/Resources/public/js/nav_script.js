/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mouseHover(){
    $('#ulNav li.element a img.noSubMenu').mouseover(function(){
       var stringAlt         = $(this).attr('alt').toLowerCase();
       var courantLink       = stringAlt+'.png';
       var newLink           = $(this).attr('src').replace(courantLink, stringAlt+'_active.png');
       //alert(newLink)
       $(this).attr('src', newLink);
    });
}

function mouseOut(){
    $('#ulNav li.element a img.noSubMenu').mouseout(function(){
       var stringAlt        = $(this).attr('alt').toLowerCase();
       var courantLink      = stringAlt+'_active.png';
       var newLink          = $(this).attr('src').replace(courantLink, stringAlt+'.png');
       $(this).attr('src', newLink);
    });
}

function mouseHoverSubMenu(){
    $('#ulNav li.element a img.subMenu').mouseover(function(){
        
        //$(this).attr('src', newLink);
        $(this).parent().css('display', 'none');
        $(this).parent().parent().children('div[class="containerSubMenu"]').animate({'height': "130px"}, 1500).css(
                'display', '');
        
        
//        var parentA        = $(this).parent();
//        $().animate({
//            height:"109px"
//        },300);
        });
}

$(function(){
    mouseHover();
    mouseOut();
    mouseHoverSubMenu();
});