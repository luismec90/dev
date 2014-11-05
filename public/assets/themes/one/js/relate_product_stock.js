$(function () {

    $("#btn-modal-add-stock").click(function () {
        $("#stock").val("");
        $("#div-amount").hide();
        $("#modal-add-stock").modal();
    });

    $("#stock").change(function () {
        var unit = $(this).find(':selected').data('unit');
        $("#unit").html(unit);
        $("#div-amount").show();
    });

    $("#form-add-stock").submit(function () {
        if ($("#stock").val() == "") {
            return false;
        }
    });

});

