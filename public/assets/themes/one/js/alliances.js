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
        var shopName = $(this).data("shop-name")
        var shop_id=$(this).data("shop-id");
        $("#shop-name").html(shopName);
        $("#to").val(shop_id);
        $("#modal-request-alliance").modal();
    });
});