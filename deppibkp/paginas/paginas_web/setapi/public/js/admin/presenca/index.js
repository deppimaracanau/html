
$(function () {
    var oTable = $('table').dataTable( {
        'sPaginationType' : 'full_numbers',
        'aaSorting': [  ]
    });

    $("#participantes").select2({
        placeholder: "Digite o e-mail do participante...",
        minimumInputLength: 3,
        tags: function(options) {
            // {"result":[{"id":"7","text":"julioneves@gmail.com"}]}
            var url = "/admin/presenca/ajax-buscar-participante/termo/" + options.term;
            $.getJSON(url, null, function(json) {
                options.callback(json);
            });
        },
        createSearchChoice: function() { return null; },
    });
});
