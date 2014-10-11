$(function () {

    if (selectedProductCategoryId != null && selectedProductId != null) {
        $("#first-delivery .categoria").val(selectedProductCategoryId);
        $("#first-delivery .producto").html(eval('category_' + selectedProductCategoryId))
        $("#first-delivery .producto").val(selectedProductId);
        $("#first-delivery .producto").removeAttr("readonly");

        var inputCosto = $("#first-delivery input.costo");
        var cantidad = 1;
        var costo = $("#first-delivery .producto option:selected").data('price');
        var valor = $(this).val();
        inputCosto.val(costo * cantidad);

        actualizarTotal();
    }

    $("#products a.add").click(function () {
        $("#products").append(item);
    });

    $("#products").on("click", "a.remove", function () {
        $(this).parent().parent().remove();
        actualizarTotal();
    });

    $("#products").on("change", "select.categoria", function () {


        var selectProduct = $(this).parent().parent().parent().find("select.producto");
        var valor = $(this).val();
        if (valor != "") {
            selectProduct.html(eval('category_' + valor));
            selectProduct.removeAttr("readonly");
        } else {
            selectProduct.html("");
            selectProduct.attr("readonly", 'true');
        }

        $(this).parent().parent().parent().find("input.costo").val("");
        actualizarTotal();
    });

    $("#products").on("change", "select.producto", function () {
        var inputCosto = $(this).parent().parent().parent().find("input.costo");
        var cantidad = $(this).parent().parent().parent().find("input.cantidad").val();
        var costo = $('option:selected', this).data('price');
        var valor = $(this).val();
        if (valor != "") {
            inputCosto.val(costo * cantidad);
        } else {
            inputCosto.val("");
        }
        actualizarTotal();
    });

    $("#products").on("change", "input.cantidad", function () {
        var selectProduct = $(this).parent().parent().parent().find("select.producto");
        var costo = $('option:selected', selectProduct).data('price');
        if (costo) {
            var cantidad = $(this).val();
            var inputCosto = $(this).parent().parent().parent().find("input.costo");
            inputCosto.val(costo * cantidad);
        }
        actualizarTotal();
    });

    $("#products").on("change", "input.costo", function () {
        actualizarTotal();
    });


});

function actualizarTotal() {
    var total = 0;
    var costoProducto;
    $("#products input.costo").each(function () {
        costoProducto = parseInt($(this).val());
        if ($.isNumeric(costoProducto)) {
            total += costoProducto;
        }
    });
    $("#retribution").val(parseInt(total * retribution));
    $("#total").val(total);
}