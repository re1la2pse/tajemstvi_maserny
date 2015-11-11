/**
 * Created by Peta on 12.10.15.
 */

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
