$(function () {
    $("#town").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $("#activity").select2({
        placeholder: "Seleccionar...",
        allowClear: true
    });

    $(".btn-request-alliance").click(function () {
        $("#form-request-alliance").trigger("reset");
        var shopName = $(this).data("shop-name");
        var shopId = $(this).data("shop-id");
        $("#shop-name").html(shopName);
        $("#to").val(shopId);
        $("#modal-request-alliance").modal();
    });

    $("#btn-contra-request-alliance").click(function () {
        $("#form-request-alliance").trigger("reset");

        var shopName = $(this).data("shop-name");
        $("#shop-name").html(shopName);

        var fromRetributionPerUserGranted = $(this).data("from-retribution-per-user-granted");
        var fromLimitPerUserGranted = $(this).data("from-limit-per-user-granted");
        var fromLimitTotalGranted = $(this).data("from-limit-total-granted");
        var toRetributionPerUserGranted = $(this).data("to-retribution-per-user-granted");
        var toLimitPerUserGranted = $(this).data("to-limit-per-user-granted");
        var toLimitTotalGranted = $(this).data("to-limit-total-granted");

        $("#from_retribution_per_user_granted").val(fromRetributionPerUserGranted);
        $("#from_limit_per_user_granted").val(fromLimitPerUserGranted);
        $("#from_limit_total_granted").val(fromLimitTotalGranted);
        $("#to_retribution_per_user_granted").val(toRetributionPerUserGranted);
        $("#to_limit_per_user_granted").val(toLimitPerUserGranted);
        $("#to_limit_total_granted").val(toLimitTotalGranted);
        $("#note").attr("placeholder", "");

        $("#modal-request-alliance").modal();
    });
});