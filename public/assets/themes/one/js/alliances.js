$(function () {
    $("#town").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $("#activity").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $(".btn-request-alliance").click(function () {
        $("#form-request-alliance").trigger("reset");
        var shopName = $(this).data("shop-name");
        $("#shop-name").html(shopName);
        $("#modal-request-alliance").modal();
    });
});