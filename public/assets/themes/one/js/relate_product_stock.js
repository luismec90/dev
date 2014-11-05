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

    $("#table-stock .btn-edit-stock").click(function () {
        $("#old_stock_id").val($(this).data("stock-id"));
        $("#edit-stock").val($(this).data("stock-id"));
        var unit=$("#edit-stock").find(':selected').data('unit');
        $("#edit-unit").html(unit);
        $("#edit-amount").val($(this).data("amount"));
        $("#modal-edit-stock").modal();
    });

    $("#table-stock .btn-delete-stock").click(function () {
        $("#stock_id").val($(this).data("stock-id"));
        $("#modal-delete-stock").modal();
    });

    $("#edit-stock").change(function () {
        var unit=$("#edit-stock").find(':selected').data('unit');
        $("#edit-unit").html(unit);
    });
});

