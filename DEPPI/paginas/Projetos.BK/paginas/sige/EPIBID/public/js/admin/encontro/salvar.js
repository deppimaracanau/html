
$(function () {
    $("#nome_encontro").select();

    $(".date").datepicker();

    $(':checkbox').iphoneStyle({
        checkedLabel: 'Sim',
        uncheckedLabel: 'Não'
    });

    $("select.select2").select2({
        width: '280px'
    });
});
