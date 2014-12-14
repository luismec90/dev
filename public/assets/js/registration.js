$(function () {

    $("#form-registration").on('change', '[required]:visible', function () {
        $(this).popover('destroy');
    });


    $('#btn-form-registration').click(function () {

        var flag = false;

        $("#form-registration [required]:visible").popover('destroy');

        $("#form-registration [required]:visible").each(function () {

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

        if (!flag && !($("#checkbox-terms").is(':checked'))) {
            $("#checkbox-terms").focus().popover({
                'trigger': 'manual',
                'placement': 'top',
                'content': 'Campo obligatorio'
            }).popover('show');
            flag = true;
        }

        if (flag)
            return false;

        coverOn();

        $("#form-registration").submit();

    });
});