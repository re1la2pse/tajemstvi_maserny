
//document ready
$(function() {
    $.nette.init();
    
    $("#sortableGalerie").sortable({containment: 'document', tolerance: 'pointer',
                                    cursor: 'pointer', opacity: 0.60,
                                    update: function(event, ui) {
                                                                                
                                        var list = [];
                                        var tmp;
                                        
                                        $("#sortableGalerie li").each(function(i) {
                                            /*bacha, toto je delikatni operace.
                                             Pri opetovnem prohozeni stejnych dvou prvku seznamu
                                             bude vysledna ciselna posloupnost VZDY stejna.
                                             
                                             jQuery sortable se dafaultne chova takto:
                                             prvni prohozeni prvnich dvou prvku: 1,0,2,3,4
                                             druhe prohozeni prvnich dvou prvku: 0,1,2,3,4
                                             Ale to nechci. (v databazi je ulozeny uz ten predesli stav)
                                             
                                             Potrebuju toto:
                                             prvni prohozeni prvnich dvou prvku: 1,0,2,3,4
                                             druhe prohozeni prvnich dvou prvku: 1,0,2,3,4
                                             Jedna se o stejnou operaci (prohozeni dvou prvku)
                                            */
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
    
    $("#sortableGalerie").disableSelection();
     
});