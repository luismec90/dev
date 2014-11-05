$(function () {

    $(".update-amount").click(function () {

        var stock_id=$(this).data("stock-id");
        var name = $(this).data("name");
        var unit = $(this).data("unit");
        var tatal_amount = $(this).data("total-amount");

        $("#stock_id").val(stock_id)
        $("#stock-name").html(name);
        $("#modal-update-amount .input-group-addon").html(unit);
        $("#current_amount").val(tatal_amount);
        $("#change_amount").val(0);
        $("#total_amount").val(tatal_amount);

        $("#modal-update-amount").modal();
    });

    $("#change_amount").change(function () {
        if (!$.isNumeric($(this).val())) {
            $(this).val(0);
        }

        var total_amount = parseInt($("#current_amount").val()) + parseInt($(this).val());

        if (total_amount < 0) {
            $(this).val(0);
            total_amount = 0;
        }

        $("#total_amount").val(total_amount);

    });

});

