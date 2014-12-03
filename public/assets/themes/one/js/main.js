$(function () {

    $("form").submit(function (e) {
        coverOn();
    });

    $("form").keypress(function(e) {
        //Enter key
        if (e.which == 13) {
            return false;
        }
    });

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);


    $('.datepickerBirthday').datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        maxDate: 0,
        yearRange: 'c-100:c'
    });

    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        maxDate: 0
    });


    $('.btn-file :file').change(function () {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().siblings("input").val(label);
    });
    $('a.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });

    $("a.info-user").click(function () {

        coverOn();

        var user_id = $(this).data("user");
        var shop_id = $(this).data("shop");

        $.ajax({
            url: "/info_user",
            data: {
                user_id: user_id,
                shop_id: shop_id
            },
            success: function (data) {
                $("#body-modal-info-user").html(data);

                coverOff();

                $("#modal-info-usuario").modal();
            }
        });

    });


    $('#btn-ver-menu').click(function () {
        if($('.sidebar-offcanvas').is(':visible')){
            $(this).html("Ver menú");
        }else{
            $(this).html("Ocultar menú");
        }
        $('.sidebar-offcanvas').toggle('ocultar-menu');

    });

    // disable mousewheel on a input number field when in focus
    // (to prevent Cromium browsers change the value when scrolling)
    $('form').on('focus', 'input[type=number]', function (e) {
        $(this).on('mousewheel.disableScroll', function (e) {
            e.preventDefault()
        })
    })
    $('form').on('blur', 'input[type=number]', function (e) {
        $(this).off('mousewheel.disableScroll')
    })

});

function coverOn() {
    $("#coverDisplay").css({
        "opacity": "1",
        "width": "100%",
        "height": "100%"
    });
}

function coverOff() {
    $("#coverDisplay").css({
        "opacity": "0",
        "width": "0",
        "height": "0"
    });
}
