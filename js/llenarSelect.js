$(document).ready(function(){
    recargaLista();
    $("#cmb_zona").change(function(){
        recargaLista();
    });
});

function recargaLista(){
    var Zona = $("#cmb_zona").val();
    $.post('asd.php',{zona:Zona},
    function(data){
        $("#comizaria").html(data)
    });
}