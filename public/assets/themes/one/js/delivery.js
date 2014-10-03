$(function () {
    $("#category").change(function () {
        var valor = $(this).val();
        console.log(eval('category_' + valor));
        $("#product").html(eval('category_' + valor));
        if(valor!=""){
            $("#product").prop("disabled",false);
        }else{
            $("#product").prop("disabled",true);
        }
    });
});