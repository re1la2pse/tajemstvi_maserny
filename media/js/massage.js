
$(function() {

   //ziskam parametr kategorie masazi z url
   var $paramArray = location.pathname.split("/");
   $paramArray.reverse();
   
   if (location.hash) {
    console.log("je hash");
   } else {
        console.log("neni hash");
   }
   
   //if (/\#idMasaze/.test($paramArray[0])) {
   if (location.hash) {
        console.log(location.hash);
        $param = location.hash.substring(9); //chci jen to cislo na konci
        console.log($param);
        $('.massage').hide();
        $('#' + $param + 'm').show();
        $('#' + $param).addClass('active');
   } else {
        console.log($paramArray[0]);
        $param = $paramArray[0];

        //schovam vsechny masaze a zobrazim jen prvni z dane kategorie
        $('.massage').hide();
        $('.' + $param + '1m').show();
     
        //rozsvitim odkaz menu
        $('.' + $param + '1').addClass('active');
        window.location.hash = "idMasaze" + $('.' + $param + '1m').attr('id').slice(0,-1); //nastavim hash to url
   }
   
   
   
   
   
   

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
      window.location.hash = "idMasaze" + id; //nastavim hash to url
      
    });

});
