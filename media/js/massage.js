
$(function() {

   //ziskam parametr kategorie masazi z url
   var $paramArray = location.pathname.split("/");
   $paramArray.reverse();
   $param = $paramArray[0];

   //schovam vsechny masaze a zobrazim jen prvni z dane kategorie
   $('.massage').hide();
   $('#' + $param + '1m').show();

   //rozscitim odkaz menu
   $('#' + $param + '1').addClass('active');

    $('.menu_item').mouseover(function() {
        $(this).css('color', '#fed136');
    }).mouseout(function() {
        if (!$(this).hasClass('active')) {
            $(this).css('color', '#C2C2C2');
        }
    });

   $('.menu_item').click(function() {

      var id = $(this).attr('id');
      var massage = $('#' + id + 'm')
      var this_li = $(this);

      $('.massage:visible').not(':animated').hide(300, function() {
          massage.show(500);
          $('.menu_item').each(function() {
              $(this).css('color', '#C2C2C2');
              $(this).removeClass('active');
          });
          this_li.css('color', '#fed136');
          this_li.addClass('active');
      });
    });

});