
$(function() {
    console.log("page ready");
    
    
    
    var form = $('#contactForm');
    var formErrors = $(".formErrors");
    
    form.submit(function() {
        
        formErrors.empty();
        
        console.log("odesilam formular");
        
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var phone = $("input[name='phone']").val();
        var message = $("textarea[name='message']").val();
            
            console.log("jmeno: " + name);
            console.log("email: " + email);
            console.log("tel: " + phone);
            console.log("zprava: " + message);
        
        if (name == "" || email == "" || phone == "" || message == "") {
            console.log("neco je prazdne");
            formErrors.append("<p>Prazdné</p>");
        }
        
        $.ajax({
            
                //na produkcnim jenom url: "/contactForm"
                url: "/tajemstvi_maserny/contactForm",
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message
                },
                cache: false,
                success: function(value) {
                    // Success messag
                    console.log("form succes");
                    console.log("returned: " + value);

                    //clear all fields
                    //$('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    console.log("form error");
                    
                },
            })
        

        
        
        return false;
    });
    
});