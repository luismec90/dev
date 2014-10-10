$(function () {


    $('form.form-submit').submit(function () {
        $("#coverDisplay").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
    });


    // Smooth Hash Link Scroll
    $('.smooth-scroll').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    /*
     $('.nav a').on('click', function () {
     if ($('.navbar-toggle').css('display') != 'none') {
     $(".navbar-toggle").click();
     }
     });
     */

    var $container = $('.portfolio-isotope');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.portfolio-item',
            resizable: true,
            resizesContainer: true
        });
    });

    // filter items when filter link is clicked
    $('#filters a').click(function () {
        var selector = $(this).attr('data-filter');
        $container.isotope({filter: selector});
        return false;
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


    $('.btn-file :file').change(function () {
        var input = $(this);
        var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().siblings("input").val(label);
    });
    $('a.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });

});
