/**
 * Author: Mountither 102486181
 * Target: quiz.html
 * Purpose: for enhanced quiz functionality
 * Created: 27/09
 * Last update: 30/09
 * Credits: internet
 */
"use strict";
$(function() {
    $(".quiz_intro").slideUp(1000).slideDown(1200);
    $(".details").css({opacity: '0.8'}).fadeToggle(1000).fadeToggle(1200);
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-green', radioClass: 'iradio_square-green', increaseArea: '30%'
    });

});



$(function() {
   $("#submit").on("click", function() {
        $("#the_quiz").fadeToggle(500).fadeToggle(500);
    });

});


countDown(500, $('#quiz_timer'));

function countDown(setTime, element) {
    if (!isNaN(setTime)) {
        var time = setTime, min, sec;

        var range = setInterval(function () {
                min = parseInt(time / 60, 10);            //returns the whole number, without an decimals
                sec = parseInt(time % 60, 10);            //returns the remainder(modulus) within 60, constraining between 0-59 seconds
                
                if (min < 10){
                    min = "0" + min;
                }
                if (sec < 10){
                    sec = "0" + sec;
                }
    
                $(element).html(min + " minutes " + sec + " seconds");
                if (--time < 0) {
                    element.html("Quiz is over");
                    $('#submit').attr("disabled", true);
                    clearInterval(countDown);
                }
        },1000);
    }
    element.css({color:'purple'});
    element.css('text-align','center');
    element.css('font-size', '50px');
    element.fadeToggle(1000).fadeToggle(3000);
}

















