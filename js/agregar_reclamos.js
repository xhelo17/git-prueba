$(document).ready(function(){
    recargaLista();
    $("#cmb_zona_1").change(function(){
        recargaLista();
    });
});

function recargaLista(){
    var Zona = $("#cmb_zona_1").val();
    $.post('funciones/llegar_select_reclamo.php',{zona:Zona},
    function(data){
        $("#cmb_prefectura").html(data)
    });
};


function guardar_inicio_reclamo()
{
    var Id_evento = $("#txt_id_evento").val();
    var Nro_reclamo = $("#txt_nroReclamo").val();
    var Sistema_ingresa = $("#cmb_sistema_ingreso").val();
    var Causa = $("#cmb_causa").val();
    var Estado = $("#cmb_estado").val();
    var Zona = $("#cmb_zona_1").val();
    var Prefectura = $("#cmb_prefectura").val();
    
    if (Nro_reclamo !="" && Nro_reclamo >-1) 
    {
        if (Sistema_ingresa !=0 && Causa !=0 && Estado!=0 && Zona !="" && Prefectura !=0)
        {
            $.post("funciones/agregar_reclamos.php",{id_evento:Id_evento,nro_reclamo:Nro_reclamo,
                sistema_ingresa:Sistema_ingresa,causa:Causa,estado:Estado,zona:Zona,prefectura:Prefectura},
            function(data)
            {
                if(data == 1)
                {
                    swal('Genial!','Todo salio bien!','success');
                }
                else
                {
                    swal('Oops...!','Algo no dejo guardar los eventos!','error');
                }
            });
        }
        else
        {
            swal('Recuerda!','Debes completar todos los campos para poder guardar reclamo.','info');
        }
    }
    else
    {
        swal("Recuerda","Debes poner un N° de reclamo valido.","info");
    }

};


function guardar_termino_reclamo() 
{
  var Id = $("#txt_id_evento1").val();
  var Nro_reclamo_1 = $("#txt_nroReclamo1").val();
  var Nuevo_estado = $("#cmb_estado1").val();

  if (Nro_reclamo_1 !="" && Nro_reclamo_1 >-1 ) {
    if (Nuevo_estado !=0)
        {
            $.post("funciones/agregar_reclamos_termino.php",{id:Id,nro_reclamo:Nro_reclamo_1,nuevo_estado:Nuevo_estado},
            function(data)
            {
                if(data == 1)
                {
                    swal('Genial!','Todo salio bien!','success');
                }
                else
                {
                    swal('Oops...!','Algo no dejo guardar los eventos!','error');
                }
            });
        }
        else
        {
            swal('Recuerda!','Debes un estado para guardar reclamo.','info');
        }
  }
  else
  {
    swal("Recuerda","Debes poner un N° de reclamo valido.","info");
  }
}
