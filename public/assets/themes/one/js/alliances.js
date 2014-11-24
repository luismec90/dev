$(function(){
    $("#town").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $("#activity").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $(".btn-request-alliance").click(function(){
        $("#modal-request-alliance").modal();
    });
});