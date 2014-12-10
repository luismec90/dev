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
        var costo = $('option:selected', this).attr('data-price');
        var valor = $(this).val();
        if (valor != "") {
            inputCosto.val(toFront(costo * cantidad));
        } else {
            inputCosto.val("");
        }
        actualizarTotal();
    });

    $("#products").on("change", "input.cantidad", function () {
        var selectProduct = $(this).parent().parent().parent().find("select.producto");
        var costo = $('option:selected', selectProduct).attr('data-price');
        if (costo) {
            var cantidad = $(this).val();
            var inputCosto = $(this).parent().parent().parent().find("input.costo");
            inputCosto.val(toFront(costo * cantidad));
        }
        actualizarTotal();
    });

    $("#products").on("change", "input.costo", function () {
        actualizarTotal();
    });

    $("#check-balance").change(function () {
        if ($(this).is(':checked')) {
            $("#balance").val(toFront($("#check-balance").attr("data-retribution")));
            $("#code").val("");
            $("#retribution-zone .ocultar2").removeClass("ocultar");
            $("#div-redimido").removeClass("hidden");
            $("#div-total").removeClass("hidden");

        } else {
            $("#balance").val("0");
            $("#code").val("0");
            $("#retribution-zone .ocultar2").addClass("ocultar");
            $("#div-redimido").addClass("hidden");
            $("#div-total").addClass("hidden");
        }

        actualizarSaldoRedimido();
    });

    $("#balance").change(function () {
        if (toBack($(this).val()) > toBack($("#check-balance").attr("data-retribution"))) {
            $(this).val("0");
        }
        actualizarSaldoRedimido();
    });

    $("#subtotal").change(function () {
        if ($("#no_register_products").is(":checked")) {
            var subtotal = toBack($(this).val());
            subtotal = $.isNumeric(subtotal) ? subtotal : 0;
            total = subtotal - toBack($("#balance_redeemed").val());
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


    $("#form-bill").on('change', '[required]:visible', function () {
        $(this).popover('destroy');
    });

    $("#submit-form").click(function () {
            var flag = false;

            $("#form-bill input:visible").popover('destroy');

            $("#form-bill [required]:visible").each(function () {

                var valor = $(this).val();

                if (valor == "") {
                    $(this).focus().popover({
                        'trigger': 'manual',
                        'placement': 'bottom',
                        'content': 'Campo obligatorio'
                    }).popover('show');
                    flag = true;
                }
                if (flag)
                    return false;
            });

            if (!flag) {
                $("#form-bill .number[required]:visible").each(function () {

                    var valor = String(toBack($(this).val()));

                    valor = valor.replace(",", ".");
                    if (!$.isNumeric(valor)) {
                        $(this).focus().popover({
                            'trigger': 'manual',
                            'placement': 'bottom',
                            'content': 'Número inválido'
                        }).popover('show');
                        flag = true;
                    }
                    if (flag)
                        return false;
                });
            }

            if (!flag) {
                if ($("#balance").is(":visible")) {
                    var balance = toBack(($("#balance").val()));
                    var subtotal = toBack(($("#subtotal").val()));

                    var maximoSaldoARedimirPermito = subtotal * retribution_per_bill;
                    console.log(maximoSaldoARedimirPermito);
                    if (balance > maximoSaldoARedimirPermito) {
                        $("#balance").popover({
                            'trigger': 'manual',
                            'placement': 'bottom',
                            'content': 'El saldo a redimir no puede ser mayor a $ ' + toFront(maximoSaldoARedimirPermito)+ ' (el '+toFront(retribution_per_bill*100)+'% del total a pagar)'
                        }).popover('show');
                        flag = true;
                    }
                }
            }

            if (!flag) {
                if ($("#balance").is(":visible")) {
                    if ($("#balance").val() == 0) {
                        $("#balance").popover({
                            'trigger': 'manual',
                            'placement': 'bottom',
                            'content': 'El saldo a redimir debe ser mayor a 0'
                        }).popover('show');
                        flag = true;
                    }
                }
            }




            if (flag)
                return false;


            $.ajax({
                type: 'POST',
                url: url_send_form,
                data: $("#form-bill").serialize(),
                beforeSend: function () {
                    coverOn();
                },
                success: function (data) {
                    coverOff();
                    $.growl(data.messages[0], {
                        type: "success",
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        },
                        placement: {
                            from: "top",
                            align: "center"
                        }
                    });
                    cleanBillForm();
                    $(window).scrollTop(0);

                }, error: function (data) {
                    coverOff();
                    data = data.responseJSON;

                    var mensaje = "<div class='alert alert-danger'><ul>";

                    $.each(data.messages, function (key, value) {
                        mensaje += "<li>" + value + "</li>";
                    });

                    mensaje += "</ul></div>";

                    $("#div-errors").html(mensaje);

                    $(window).scrollTop(0);
                }
            })
        }
    )
    ;
});

function actualizarSaldoRedimido() {

    var inputBalance = toBack($("#balance").val());

    var balanceRedeemed = $.isNumeric(inputBalance) ? inputBalance : 0;

    $("#balance_redeemed").val(toFront(balanceRedeemed));

    actualizarTotal();
}

function actualizarTotal() {

    var subTotal = 0;
    var inputBalanceRedeemed = toBack($("#balance_redeemed").val());

    var balanceRedeemed = $.isNumeric(inputBalanceRedeemed) ? inputBalanceRedeemed : 0;

    if (!$("#no_register_products").is(":checked")) {
        var costoProducto;
        $("#products input.costo").each(function () {
            costoProducto = parseInt(toBack($(this).val()));
            if ($.isNumeric(costoProducto)) {
                subTotal += costoProducto;
            }
        });
    } else {
        subTotal = toBack($("#subtotal").val());
    }

    var total = subTotal - balanceRedeemed;
    if (total < 0) {
        total = 0;
    }
    $("#retribution").val(toFront(parseInt(total * retribution)));
    $("#subtotal").val(toFront(subTotal));
    $("#total").val(toFront(total));

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
                $("#info-balance").html(toFront(data.retribution));
                $("#check-balance").attr("data-retribution", data.retribution);
                $("#retribution-zone .ocultar1").removeClass("ocultar");
            } else {
                UsuarioNoTieneSaldo()

            }
        }
    });
}

function UsuarioNoTieneSaldo() {
    $("#nombre-usuario").html("");
    $("#info-balance").html("");
    $("#check-balance").attr("data-retribution", "0");
    $("#check-balance").attr('checked', false);
    $("#retribution-zone .ocultar1").addClass("ocultar");
    $("#retribution-zone .ocultar2").addClass("ocultar");
    $("#balance").val("0");
    actualizarTotal();
    $("#code").val("0");
    $("#div-redimido").addClass("hidden");
    $("#div-total").addClass("hidden");
}

function cleanBillForm() {
    document.getElementById("form-bill").reset();
    document.getElementById("div-errors").innerHTML = "";
    $("#products .item:not(:first)").remove();

    if ($("#products").is(":hidden")) {
        $("#no_register_products").trigger("change")
    }
    if ($("#retribution-zone").is(":visible")) {
        UsuarioNoTieneSaldo();
    }
}