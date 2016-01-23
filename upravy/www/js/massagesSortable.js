$(function() {
    $.nette.init();

    $("#sortable").sortable({containment: 'document', tolerance: 'pointer', cursor: 'pointer', opacity: 0.60, update:
        function(event, ui) {
            var list = [];
            var tmp;

            $(".kategorie").each(function(i) {
                tmp = $(this);
                list.push($(this).attr('idNumber'));
                tmp.attr('idNumber', i);
            });

            var listString = list.toString();
            console.log(listString);

            $.nette.ajax({
                type: 'GET',
                url: "?do=changeOrder",
                data: {
                    list: listString
                },
                success: function (data) {

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });

    $("#sortable").disableSelection();

    $("li > ul").sortable({containment: 'document', tolerance: 'pointer', cursor: 'pointer', opacity: 0.60, update:
        function(event, ui) {
            var list = [];
            var tmp;

            $(".masaz").each(function(i) {
                tmp = $(this);
                list.push($(this).attr('idNumber'));
                tmp.attr('idNumber', i);
            });

            var listString = list.toString();
            console.log(listString);

            $.nette.ajax({
                type: 'GET',
                url: "?do=changeOrderMasaze",
                data: {
                    list: listString
                },
                success: function (data) {

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });

    $("li > ul").disableSelection();

});

