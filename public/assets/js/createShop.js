$(function () {

    $("#town").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $(".help").popover({placement: 'right',trigger:'click'});

});