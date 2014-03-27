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
    $('#ulNav li.liSubMenu').mouseenter(function(){
        
        $(this).animate(
                {
                    'height': "130px"
                },{
                    start: function(){
                        $(this).children('a:first-child').css('display', 'none');
                        $(this).children('.containerSubMenu').css('display', '');
                    },
                    duration: 300,
                    step: function() {
                           $(this).css("overflow","visible");
                           $(this).children('a:first-child').css('display', 'none');
                    },
                    queue: false,
                    complete: function(){
                    }     
                    }
                );
        });
}

function mouseOutSubMenu(){
    
    $('#ulNav li.liSubMenu').mouseleave(function(){
        $(this).animate(
                {
                   'height': '55px' 
                },
                {
                    duration: 300,
                    step: function(){
                        $(this).css("overflow", "visible");
                    },
                    queue: false,
                    complete: function(){
                        $(this).children('a:first-child').css('display', '');
                    }
                });
    });
}

$(function(){
    mouseHover();
    mouseOut();
    mouseHoverSubMenu();
    mouseOutSubMenu();
});