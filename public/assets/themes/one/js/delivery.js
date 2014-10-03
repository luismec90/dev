$(function () {
    $("#category").change(function () {
        var valor = $(this).val();
        if(valor!=""){
            $("#product").html(eval('category_' + valor));
            $("#product").removeAttr("readonly");
        }else{
            $("#product").html("");
            $("#product").attr("readonly",'true');
        }
    });
});