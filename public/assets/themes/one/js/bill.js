$(function () {

    $("#email").change(function () {
        checkRetribution($(this).val());
    });

    $("#email").autocomplete({
        source: "autouseremail",
        minLength: 2,
        select: function (event, ui) {
            checkRetribution(ui.item.value);
        }
    });

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
            $("#code").val("");
            $("#retribution-zone .ocultar2").removeClass("ocultar");

        } else {
            $("#balance").val("0");
            $("#code").val("0");
            $("#retribution-zone .ocultar2").addClass("ocultar");
        }

        actualizarSaldoRedimido();
    });

    $("#balance").change(function () {
        if ($(this).val() > $("#check-balance").data("retribution")) {
            $(this).val("0");
        }
        actualizarSaldoRedimido();
    });

    $("#subtotal").change(function () {
        if ($("#no_register_products").is(":checked")) {

            var subtotal = $.isNumeric($(this).val()) ? $(this).val() : 0;
            total = subtotal - $("#balance_redeemed").val();
            $("#total").val(total);
            $("#retribution").val(parseInt(total * retribution));

        }
    });

    $("#no_register_products").change(function () {
        if ($(this).is(':checked')) {
            $("#products").addClass('hide');
            $("#retribution").val("0");
            $("#subtotal").prop('readonly', false).val("").focus();
            $("#total").val("0");
            $("#email").prop('required', true);
            $("#products .form-control").each(function () {
                $(this).prop('required', false);
            });
        } else {
            $("#products").removeClass('hide');
            $("#subtotal").prop('readonly', true);
            $("#email").prop('required', false);
            actualizarTotal();
            $("#products .form-control").each(function () {
                $(this).prop('required', true);
            });
        }
    });

});

function actualizarSaldoRedimido() {

    var inputBalance = $("#balance").val();

    var balanceRedeemed = $.isNumeric(inputBalance) ? inputBalance : 0;

    $("#balance_redeemed").val(balanceRedeemed);

    actualizarTotal();
}

function actualizarTotal() {

    var subTotal = 0;
    var inputBalanceRedeemed = $("#balance_redeemed").val();

    var balanceRedeemed = $.isNumeric(inputBalanceRedeemed) ? inputBalanceRedeemed : 0;

    if (!$("#no_register_products").is(":checked")) {

        var costoProducto;
        $("#products input.costo").each(function () {
            costoProducto = parseInt($(this).val());
            if ($.isNumeric(costoProducto)) {
                subTotal += costoProducto;
            }
        });
    } else {
        subTotal = $("#subtotal").val();
    }

    var total = subTotal - balanceRedeemed;
    if (total < 0) {
        total = 0;
    }
    $("#retribution").val(parseInt(total * retribution));
    $("#subtotal").val(subTotal);
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