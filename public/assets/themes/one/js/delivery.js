$(function () {

    if (selectedProductCategoryId != null && selectedProductId != null) {
        $("#category").val(selectedProductCategoryId);
        $("#product").html(eval('category_' + selectedProductCategoryId))
        $("#product").val(selectedProductId);
        $("#product").removeAttr("readonly");
    }

    $("#category").change(function () {
        var valor = $(this).val();
        if (valor != "") {
            $("#product").html(eval('category_' + valor));
            $("#product").removeAttr("readonly");
        } else {
            $("#product").html("");
            $("#product").attr("readonly", 'true');
        }
    });
});