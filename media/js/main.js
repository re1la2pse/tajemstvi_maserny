
$(function (){
    $('.carousel').carousel({
        interval: 3500, //changes the speed
        pause: "none"
    })

    $("#dialogReklama span").click(function() {
       $(this).parents('div').hide();
    });
});