function reclamo_inicio()
{

    var Nro_reclamo_inicio = $("#txt_nro_Reclamo").val();
    var Sistema_ingreso = $("#cmb_sistema_ingreso").val();
    var Causa = $("#cmb_causa").val();
    var Estado_inicio = $("#cmb_estado").val();
    var Zona = $("#cmb_zona_1").val();
    var Prefectura = $("#cmb_prefectura").val();


    if (Nro_reclamo_inicio >=0 && Nro_reclamo_inicio!="" &&  Sistema_ingreso!=0 && Causa!=0 && Estado_inicio!=0 && Zona!=0 && Prefectura!=0)
    {
        $.post("funciones/reclamo_ingreso.php",{nro_reclamo_inicio:Nro_reclamo_inicio,sistema_ingreso:Sistema_ingreso,
        causa:Causa,estado_inicio:Estado_inicio,zona:Zona,prefectura:Prefectura},
        function(data)
        {
            if (data == 1)
            {
                swal(
                {
                    title: 'INFORMACIÓN',
                    text:  'SE INGRESO CORRECTAMENTE',
                    type:  'info',
                    confirmButtonColor: '#139c41'
                }
            );
            }
            else
            {
                swal({
                    title: 'INFORMACIÓN',
                    text:  'NO HUBO CAMBIOS EN EL REGISTRO',
                    type:  'info',
                    confirmButtonColor: '#139c41'
                });
            }
        });
    }
    else
    {
        swal({
                    title: 'RECUERDA!',
                    text:  'DEBES COMPLETAR TODOS LOS CAMPOS PARA SU INSERSIÓN',
                    type:  'info',
                    confirmButtonColor: '#139c41'
                });
    }

   
};

function termino_reclamo()
{
    var NroReclamo_termino = $("#txt_nroReclamo_termino").val();
    var Nuevo_estado = $("#cmb_estado_termino").val();
    if (Nuevo_estado!=0)
    {
        $.post("funciones/reclamo_ingreso_termino.php",{nroReclamo_termino:NroReclamo_termino,nuevo_estado:Nuevo_estado},
        function (data)
        {
            if (data == 1)
            {
                swal(
                    {
                        title: 'INFORMACIÓN',
                        text:  'SE ACTUALIZÓ CORRECTAMENTE',
                        type:  'info',
                        confirmButtonColor: '#139c41'
                    }
                );
            }
            else
            {
                swal({
                        title: 'INFORMACIÓN',
                        text:  'NO HUBO CAMBIOS EN EL REGISTRO',
                        type:  'info',
                        confirmButtonColor: '#139c41'
                    });
            }   
        });        
    }
    else
    {
        swal({
                    title: 'RECUERDA!',
                    text:  'DEBES SELECCIONAR UN NUEVO ESTADO PARA SU INSERSIÓN',
                    type:  'info',
                    confirmButtonColor: '#139c41'
                });
    }


};