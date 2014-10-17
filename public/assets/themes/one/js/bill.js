$(function () {

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


    $("#check-balance").change(function () {
        if ($(this).is(':checked')) {
            $("#balance").val($("#check-balance").data("retribution"));
            actualizarTotal()
            $("#code").val("");
            $("#retribution-zone .ocultar2").removeClass("ocultar");
        } else {
            $("#balance").val("0");
            actualizarTotal();
            $("#code").val("0");
            $("#retribution-zone .ocultar2").addClass("ocultar");
        }
    });

    $("#balance").change(function () {
        if ($(this).val() > $("#check-balance").data("retribution")) {
            $(this).val("0");
        }
        actualizarTotal();
    });
    $("#total").change(function () {

        if ($.isNumeric($(this).val())) {
            var total = parseInt($(this).val());
        } else {
            var total = 0;
        }
        $("#retribution").val(parseInt(total * retribution));
    });

    $("#no_register_products").change(function () {
        if ($(this).is(':checked')) {
            $("#products").addClass('hide');
            $("#retribution").val("0");
            $("#total").prop('readonly', false).val("").focus();
            $("#email").prop('required', true);
            $("#products .form-control").each(function () {
                $(this).prop('required', false);
            });
        } else {
            $("#products").removeClass('hide');
            $("#total").prop('readonly', true);
            $("#email").prop('required', false);
            actualizarTotal();
            $("#products .form-control").each(function () {
                $(this).prop('required', true);
            });
        }
    });

    $("#email").autocomplete({
        source: "autouseremail",
        minLength: 3,
        select: function (event, ui) {
            $('#email').val(ui.item.value);
            checkRetribution(ui.item.value);
        }
    });

    $("#email").change(function () {
        checkRetribution($(this).val());
    });
});

function actualizarTotal() {
    var total = 0;
    if ($.isNumeric($("#balance").val())) {
        total = parseInt($("#balance").val()) * -1;
    }
    var costoProducto;
    $("#products input.costo").each(function () {
        costoProducto = parseInt($(this).val());
        if ($.isNumeric(costoProducto)) {
            total += costoProducto;
        }
    });
    if (total < 0) {
        total = 0;
    }
    $("#retribution").val(parseInt(total * retribution));
    $("#total").val(total);
}
function checkRetribution(email) {
    $.ajax({
        url: "getuser",
        method: "GET",
        type: "json",
        data: {
            email: email
        },
        success: function (data) {
            if (data != "[]" && data.retribution != 0) {
                $("#nombre-usuario").html(data.first_name + " " + data.last_name);
                $("#info-balance").html(data.retribution);
                $("#check-balance").attr("data-retribution", data.retribution);
                $("#retribution-zone .ocultar1").removeClass("ocultar");
            } else {
                $("#nombre-usuario").html("");
                $("#info-balance").html("");
                $("#check-balance").attr("data-retribution", "0");
                $("#check-balance").attr('checked', false);
                $("#retribution-zone .ocultar1").addClass("ocultar");
                $("#retribution-zone .ocultar2").addClass("ocultar");
                $("#balance").val("0");
                actualizarTotal();
                $("#code").val("0");
            }
        }
    });
}