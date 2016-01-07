/**
 * Created by Peta on 12.10.15.
 */

 $(function() {

    var address = $('#voucherForm .address');

    address.attr('disabled', 'disabled');
    address.css('background-color', 'grey');

    $('#fdelivery').change(function() {

       if ($(this).val() === "1") { //poslani postou
           address.removeAttr('disabled');
           address.css('background-color', 'white');
       } else {
           address.attr('disabled', 'disabled');
           address.css('background-color', 'grey');
       }
    });

    //validace formulare
    var form = $('#voucherForm');
    var formErrors = $(".formErrors");
    var formSuccess = $(".formSuccess");

   form.submit(function() {

       formErrors.empty();
       formSuccess.empty();

       var jmeno = $("input[name='name']").val();
       var email = $("input[name='email']").val();
       var text = $("input[name='customText']").val();
       var hodnota = $("select[name='valueOfVoucher']").val();
       var doruceni = $("select[name='delivery']").val();
       var ulice = $("input[name='street']").val();
       var mesto = $("input[name='city']").val();
       var psc = $("input[name='psc']").val();

       //console.log(jmeno + email +  text  + hodnota + doruceni + ulice + mesto + psc);

       if (jmeno != "" && email != "" && text != "" && hodnota != "" && doruceni != "") {

           if (doruceni == 1) {
               if (ulice == "" || mesto == "" || psc == ""){
                   formErrors.append("<p>Prosíme, vyplňte všechny pole.</p>");
                   return false;
               }

               //kontrola PSC
               var pattern =/^[0-9]{5}$/;
               if(!pattern.test(psc)) {
                   formErrors.append("<p>Zadejte PSČ ve správném tvaru.</p>");
                   return false;
               }
           }
       } else {
           formErrors.append("<p>Prosíme, vyplňte všechny pole.</p>");
           return false;
       }

       //Kontrola tvaru emailu
       pattern = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
       if(!pattern.test(email)){
           //console.log("spatny email");
           formErrors.append("<p>Zadejte prosím email ve správném tvaru.</p>");
           return false
       }



       //Formular byl vyplnen spravne muzu odeslat
       $.ajax({
           //na produkcnim jenom url: "/contactForm"
           url: "/voucherForm",
           type: "POST",
           data: {
               jmeno: jmeno,
               email: email,
               text: text,
               hodnota: hodnota,
               doruceni: doruceni,
               ulice: ulice,
               mesto: mesto,
               psc: psc
           },
           cache: false,
           success: function(value) {

               if(value == "ok")
                   formSuccess.append("<p>Vaše zpráva byla úspěšne odeslána.</p>");
               else {
                   formErrors.append("<p>Zprávu se nepodařilo odeslat, zkuste to později..</p>");
                   console.log(value);
               }
               form[0].reset();
           },
           error: function() {
               // Fail message
               console.log("form error");

           }
       })


       return false;
   });

 });