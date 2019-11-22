<?php
include "conector.php";
$id = $_POST["id"];
$sql_lista_evento ="SELECT
                    evento.id_evento,
                    evento.descripcion_evento
                    FROM
                    evento 
                    WHERE id_evento='$id'";
$resultados = ejecutaSQL_select("conecta",$sql_lista_evento);
$resultados1 = ejecutaSQL_select("conecta",$sql_lista_evento);

$sql_ingreso_motivo = "SELECT
                        tb_motivo.id_motivo,
                        tb_motivo.glosa_motivo
                        FROM
                        tb_motivo";
$resultado2 = ejecutaSQL_select("conecta",$sql_ingreso_motivo);

$sql_ingreso_tipo_evento ="SELECT
                        tb_tipoevento.id_tipoevento,
                        tb_tipoevento.glosa_tipoevento
                        FROM
                        tb_tipoevento";
$resultado3 =ejecutaSQL_select("conecta",$sql_ingreso_tipo_evento);

$sql_ingreso_personal ="SELECT
                        tb_personalintervino.id_intervino,
                        tb_personalintervino.glosa_intervino
                        FROM
                        tb_personalintervino";
$resultado4 =ejecutaSQL_select("conecta",$sql_ingreso_personal);


$sql_ingreso_zona="SELECT
                    REPARTICION.CORRELATIVO,
                    REPARTICION.ID_TIPO,
                    REPARTICION.ID_CLASE,
                    REPARTICION.DESCRIPCION,
                    REPARTICION.ID_CODIGO_VIGENTE,
                    REPARTICION.ESTADO_VIGENCIA
                    FROM
                    REPARTICION
                    WHERE
                    REPARTICION.ID_TIPO='63' AND
                    REPARTICION.ESTADO_VIGENCIA ='0'";
$resultado5 =ejecutaSQL_select("conecta",$sql_ingreso_zona);


$sql_ingreso_provincia="SELECT
                        PROVINCIA.ID_PROVINCIA,
                        PROVINCIA.DESCRIPCION_PROVINCIA
                        FROM
                        PROVINCIA";
$resultado6 =ejecutaSQL_select("conecta",$sql_ingreso_provincia);

?>
<script src="js/llenarSelect.js"></script>
<head>
</head>

<div class="content mt-3">
    <div class="row">
        <div class="card">
            <div class="card-body">
            <form>
            <div class="row">
                <div class="col-md-12">
                <strong class="card-title">CODIGO DEL EVENTO :</strong>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">ID DE EVENTO :</label><br>  
                    <div class="alert alert-success" role="alert">
                        <?php  while($res = mysqli_fetch_object($resultados)){   ?>
                        <h4 class="alert-heading"><?php echo $res->id_evento; ?></h4>
                        <?php echo $res->descripcion_evento;?>
                        <?php }?>
                    </div>
                    <input type="hidden" value="<?php echo $id;?>" id="txt_id_evento">
                </div>    
                <div class="col-md-6">
                    <label for="inputEmail4">MOTIVO :</label>
                    <select id="cmb_motivo" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="" selected>SELECCION DE MOTIVO</option>
                        <?php while($res = mysqli_fetch_object($resultado2)) { ?>
                            <option  value="<?php echo $res->id_motivo; ?>"><?php echo $res->glosa_motivo; ?></option> 
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">TIPO DE EVENTO :</label>
                    <select id="cmb_tipoEvento" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="0" selected>SELECCION DE EVENTO</option>
                        <?php while($res = mysqli_fetch_object($resultado3)) { ?>
                            <option  value="<?php echo $res->id_tipoevento; ?>"><?php echo $res->glosa_tipoevento; ?></option> 
                         <?php }?>
                    </select>
                </div>
                                        
                <div class="col-md-6">
                    <label for="inputEmail4">FECHA DE INICIO :</label>
                    <input type="date" class="form-control" id="txt_fechaInicio">
                    
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">HORA DE INICIO :</label>
                    <input type="time" class="form-control" id="txt_horaInicio">
                </div>
                
                <div class="col-md-6">
                    <label for="inputEmail4">FECHA DE TERMINO :</label>
                    <input type="date" class="form-control" id="txt_fechaTermino">
                    
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">HORA DE TERMINO :</label>
                    <input type="time" class="form-control" id="txt_horaTermino">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4">AUTORIZADO :</label>
                    <select id="cmb_autorizado" class="browser-default custom-select custom-select-lg mb-2">
                        <option value="0">SELECION DE AUTORIZACION</option>
                        <option value="si">si</option>
                        <option value="no">no</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">CANTIDAD DE ASISTENTES :</label>
                    <input type="number" min="0" class="form-control" id="txt_cant_asistente">
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4">PERSONAL QUE INTERVINO :</label>
                    <select id="cmb_personalIntervino" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="0" selected>SELECCION PERSONAL QUE INTERVINO </option>
                        <?php while($res = mysqli_fetch_object($resultado4)) { ?>
                        <option  value="<?php echo $res->id_intervino; ?>"><?php echo $res->glosa_intervino; ?></option> 
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">ZONA :</label>
                    <select id="cmb_zona" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="0" selected>SELECCION DE ZONA</option>
                        <?php while($res = mysqli_fetch_object($resultado5)) { ?>
                        <option  value="<?php echo $res->CORRELATIVO; ?>"><?php echo $res->DESCRIPCION; ?></option> 
                        <?php }?>
                    </select>
                </div>

                <div class="col-md-6" id="comizaria">
                    <label for="inputEmail4">COMISARIA :</label>
                    <select id="cmb_comizaria" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="0" selected>SELECCION DE COMISARIA</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4">PROVINCIA :</label>
                    <select id="cmb_provincia" class="browser-default custom-select custom-select-lg mb-3">
                        <option value="0" selected>SELECCION DE PROVINCIA</option>
                        <?php while($res = mysqli_fetch_object($resultado6)) {?>
                            <option value="<?php echo $res->ID_PROVINCIA; ?>"><?php echo $res->DESCRIPCION_PROVINCIA; ?></option>
                        <?php }?>                                                  
                    </select>
                </div>

                <div class="col-md-12">
                    <input onclick="editar_evento()" type="button" value="GUARDAR EVENTO" class="btn btn-outline-success btn-lg btn-block">
                </div>

            </div>
        </form>
            </div>

        </div>

    </div>
</div>


<script>
function editar_evento()
{
var Id_editar = $("#txt_id_evento").val();
var Motivo_editar = $("#cmb_motivo").val();
var Tipo_evento_editar = $("#cmb_tipoEvento").val();
var Fecha_inicio = $("#txt_fechaInicio").val();
var Hora_inicio = $("#txt_horaInicio").val();
var Fecha_termino = $("#txt_fechaTermino").val();
var Hora_termino = $("#txt_horaTermino").val();
var Autorizado_editar = $("#cmb_autorizado").val();
var Cant_asistente = $("#txt_cant_asistente").val();
var Perso_intervino = $("#cmb_personalIntervino").val();
var Zona_editar = $("#cmb_zona").val();
var Comizaria_editar = $("#cmb_comizaria").val();
var Provincia_editar = $("#cmb_provincia").val();
/*
alert(Id_editar+"\n"+Motivo_editar+"\n"+Tipo_evento_editar+"\n"+Fecha_inicio+"\n"+Hora_inicio+"\n"+
    Fecha_termino+"\n"+Hora_termino+"\n"+Autorizado_editar+"\n"+ Cant_asistente+"\n"+Perso_intervino+"\n"+
    Zona_editar+"\n"+Comizaria_editar+"\n"+Provincia_editar);
*/
if (Motivo_editar!=0 && Tipo_evento_editar!=0 && Autorizado_editar!=0 && Cant_asistente!=0 && Perso_intervino!=0 && Zona_editar!=0 && Comizaria_editar!=0 && Provincia_editar!=0)
{
    if (Fecha_inicio <= Fecha_termino && Fecha_inicio!="" && Fecha_termino!="")
    {
        if (Hora_inicio <= Hora_termino && Hora_inicio!="" && Hora_termino!="")
        {
            $.post("funciones/editar_evento.php",
                {id_editar:Id_editar,motivo_editar:Motivo_editar,tipo_evento_editar:Tipo_evento_editar,
                fecha_inicio:Fecha_inicio,hora_inicio:Hora_inicio,Fecha_termino:Fecha_termino,hora_termino:Hora_termino,
                autorizado_editar:Autorizado_editar,cant_asistente:Cant_asistente,perso_intervino:Perso_intervino,
                zona_editar:Zona_editar,comizaria_editar:Comizaria_editar,provincia_editar:Provincia_editar},
                function(data) 
                {
                    if (data == 1)
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
            swal('Recuerda!','Debes ingresar "HORAS" correctas para poder guardar el evento.','info');  
        }
    }
    else
    {
        swal('Recuerda!','Debes ingresar "FECHAS" correctas para poder guardar el evento.','info');  
    }
}
else
{
    swal('Recuerda!','Debes completar "TODOS" los campos para poder guardar el evento.','info');  
}


};
</script>



