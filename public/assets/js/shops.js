$(function ($) {
    /* ---------------------------------------------- /*
     * TimeCicles
     /* ---------------------------------------------- */

    var countdown = $('.countdown-time');

    createTimeCicles();

    $(window).on('resize', windowSize);

    function windowSize() {
        countdown.TimeCircles().destroy();
        createTimeCicles();
        countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function () {
            countdown.removeClass('animated bounceIn');
        });
    }

    function createTimeCicles() {
        countdown.addClass('animated bounceIn');
        countdown.TimeCircles({
            fg_width: 0.013,
            bg_width: 0.6,
            circle_bg_color: '#ffffff',
            time: {
                Days: {"text": "Dias", color: '#19B5FE'},
                Hours: {"text": "Horas", color: '#19B5FE'},
                Minutes: {"text": "Minutos", color: '#19B5FE'},
                Seconds: {"text": "Segundos", color: '#19B5FE'}
            }
        });
        countdown.on('webkitAnimationEnd mozAnimationEnd oAnimationEnd animationEnd', function () {
            countdown.removeClass('animated bounceIn');
        });
    }

    $("#btn-recommend").click(function () {
        $("#modal-recommend").modal();
    });

    $("#btn-recommend").click(function () {

        $("#name").val("");
        $("#email").val("");
        $("#note").val("");

        $("#modal-recommend").modal();
    });

    $("#name,#email").change(function () {
        $(this).popover('destroy');
    });

    $("#btn-modal-redemmed").click(function () {

        flag = false;

        var name = $("#name").val();
        var email = $("#email").val();

        if (name == "") {
            $("#name").popover({
                'trigger': 'manual',
                'placement': 'bottom',
                'content': 'Campo obligatorio'
            }).popover('show').focus();
            flag = true;
        }

        if (!flag && email == "") {
            $("#email").popover({
                'trigger': 'manual',
                'placement': 'bottom',
                'content': 'Campo obligatorio'
            }).popover('show').focus();
            flag = true;
        }

        if (!flag) {
            var regexp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var check = $("#email").val();
            if (!check.match(regexp)) {
                $("#email").focus().popover({
                    'trigger': 'manual',
                    'placement': 'bottom',
                    'content': 'Este email no es inválido'
                }).popover('show');
                flag = true;
            }
        }

        if (flag)
            return false;

        coverOn();
        $("#form-recommend").submit();
    });
});