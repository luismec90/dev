$(function () {

    $("#town_id").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $(".help").popover({placement: 'right', trigger: 'hover'});

    $("#form-create-shop input").keypress(function (e) {
        $(this).popover('destroy');
    });

    $("#town_id").change(function () {
        $("#div-location").popover('destroy');
    });

    $("#div-activities input:checkbox").change(function (e) {
        $("#div-activities").popover('destroy');
    });

    $("#submit-form").click(function () {
        var flag = false;

        $("#form-create-shop input:visible").popover('destroy');

        $("#form-create-shop [required]:visible").each(function () {

            var valor = $(this).val();
            valor = valor.replace(",", ".");
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
            if ($("#town_id").val() == "") {
                $("#div-location").popover({
                    'trigger': 'manual',
                    'placement': 'bottom',
                    'content': 'Campo obligatorio'
                }).popover('show');

                $('html, body').animate({scrollTop: $('#div-location').offset().top}, 'fast');
                flag = true;
            }
        }

        if (!flag) {
            if ($("#div-activities input:checked").length == 0) {
                $("#div-activities").focus().popover({
                    'trigger': 'manual',
                    'placement': 'bottom',
                    'content': 'Debes seleccionar al menos una actividad'
                }).popover('show');
                flag = true;
            }
        }

        if (!flag) {
            var regexp = /^[a-zA-Z0-9-_]+$/;
            var check = $("#link").val();
            if (!check.match(regexp)) {
                $("#link").focus().popover({
                    'trigger': 'manual',
                    'placement': 'bottom',
                    'content': 'Este campo sólo puede contener letras, números y guiones.'
                }).popover('show');
                flag = true;
            }
        }

        if (!flag) {
            var regexp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var check = $("#email").val();
            if (!check.match(regexp)) {
                $("#email").focus().popover({
                    'trigger': 'manual',
                    'placement': 'bottom',
                    'content': 'El formato del email es inválido'
                }).popover('show');
                flag = true;
            }
        }

        if (flag)
            return false;

        $("#submit-form").data("loading-text", "Enviando...").button("loading");

        $("#form-create-shop").submit();

    });

});