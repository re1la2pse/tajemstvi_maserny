
$(function() {

    var form = $('#contactForm');
    var formErrors = $(".formErrors");
    var formSuccess = $(".formSuccess");
    
    form.submit(function() {
        
        formErrors.empty();
        formSuccess.empty();
        
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var message = $("textarea[name='message']").val();
        
        if (name == "" || email == "" || phone == "" || message == "") {
            //console.log("neco je prazdne");
            formErrors.append("<p>Prosíme, vyplňte všechny pole.</p>");
            return false;
        }

        //Kontrola tel. čísla. Vždycky se najde nějaký ocas, který tam zadá nějaků pičovinu
        var pattern =/^[0-9]{9,}$/;
        if(!pattern.test(phone)) {
            //console.log("spatne cislo tel");
            formErrors.append("<p>Zadejte telefon ve správném tvaru.</p>");
            return false;
        }

        //Kontrola tvaru emailu
        pattern = /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        if(!pattern.test(email)){
            //console.log("spatny email");
            formErrors.append("<p>Zadejte prosím email ve správném tvaru.</p>");
            return false
        }


        //Formular byl vyplneny spravne, muzu odeslat
        $.ajax({
                //na produkcnim jenom url: "/contactForm"
                url: "/contactForm",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
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