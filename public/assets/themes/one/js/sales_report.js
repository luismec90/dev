$(function () {

    if ($("#category").val() != "") {
        $("#product").html(eval('category_' + $("#category").val()));
        var productSelected = $("#product").data("product-selected");
        $("#product").removeAttr("readonly");
        $("#product").val(productSelected);

    }
    $("#category").change(function () {
        var selectProduct = $("#product");
        var valor = $(this).val();
        if (valor != "") {
            selectProduct.html(eval('category_' + valor));
            selectProduct.removeAttr("readonly");
        } else {
            selectProduct.html("");
            selectProduct.attr("readonly", 'true');
        }
    });

    $("#table-report button.delete-sale").click(function () {
        $("#modal-delete-bill").modal();
        $("#bill_id").val($(this).data("id-bill"));
    });
    $("[data-toggle=tooltip]").tooltip();
});