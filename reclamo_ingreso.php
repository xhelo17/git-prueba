<?php
include "conector.php";


$sql_sistema_ingreso ="SELECT
                        tb_sistema_ingreso.id_sistema_ingreso,
                        tb_sistema_ingreso.glosa_sistema_ingreso
                        FROM
                        tb_sistema_ingreso";
$resultado1 = ejecutaSQL_select("conecta",$sql_sistema_ingreso);

$sql_causa = "SELECT
                tb_causa_reclamo.id_causa,
                tb_causa_reclamo.glosa_causa
                FROM
                tb_causa_reclamo";
$resultado2 = ejecutaSQL_select("conecta",$sql_causa);

$sql_estado = "SELECT
                tb_estado_reclamo.id_estado,
                tb_estado_reclamo.glosa_estado
                FROM
                tb_estado_reclamo
                ";
$resultado3 = ejecutaSQL_select("conecta",$sql_estado);
$resultado3_1 = ejecutaSQL_select("conecta",$sql_estado);

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
$resultado4 =ejecutaSQL_select("conecta",$sql_ingreso_zona);

$sql_provincia = "SELECT
                tb_provincia.id_provincia,
                tb_provincia.id_region,
                tb_provincia.glosa_provincia
                FROM
                tb_provincia";
$resultado5 =ejecutaSQL_select("conecta",$sql_provincia);

?>

<div class="content mt-3">
    <div class="row">
        <div class="card">
            <div class="col-md-12">
                <div class ="card-header">
                    <strong class="card-title">INGRESO DE RECLAMO</strong>
                </div>

                <div class ="card-body">
                    <div class="default-tab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                             <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-calificacionInicial-tab" data-toggle="tab" href="#nav-calificacionInicial" role="tab" aria-controls="nav-calificacionInicial" aria-selected="true">CALIFICACION INICIAL</a>
                                    <a class="nav-item nav-link" id="nav-calificacionFinal-tab" data-toggle="tab" href="#nav-calificacionFinal" role="tab" aria-controls="nav-calificacionFinal" aria-selected="false">CALIFICACION FINAL</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-calificacionInicial" role="tabpanel" aria-labelledby="nav-calificacionInicial-tab">
                                    <form>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE RECLAMO :</label>
                                                <input type="number" value="0" min="0" class="form-control" id="txt_nro_Reclamo">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">SISTEMA DE INGRESO :</label>
                                                <select id="cmb_sistema_ingreso" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE SISTEMA INGRESO</option>
                                                    <?php while($res = mysqli_fetch_object($resultado1)) { ?>
                                                     <option  value="<?php echo $res->id_sistema_ingreso; ?>"><?php echo $res->glosa_sistema_ingreso; ?></option> 
                                                    <?php }?>
                                                </select>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <label for="inputEmail4">CAUSA :</label>
                                                <select id="cmb_causa" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE CAUSA</option>
                                                    <?php while($res = mysqli_fetch_object($resultado2)) { ?>
                                                     <option  value="<?php echo $res->id_causa; ?>"><?php echo $res->glosa_causa; ?></option> 
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ESTADO :</label>
                                                <select id="cmb_estado" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE ESTADO</option>
                                                    <?php while($res = mysqli_fetch_object($resultado3)) { ?>
                                                     <option  value="<?php echo $res->id_estado; ?>"><?php echo $res->glosa_estado; ?></option> 
                                                    <?php }?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ZONA :</label>
                                                <select id="cmb_zona_1" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="" selected>SELECCION DE ZONA</option>
                                                    <?php while($res = mysqli_fetch_object($resultado4)) { ?>
                                                              <option  value="<?php echo $res->CORRELATIVO; ?>"><?php echo $res->DESCRIPCION; ?></option> 
                                                        <?php }?>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">PREFECTURA :</label>
                                                <select id="cmb_prefectura" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE PREFECTURA</option>
                                                    <?php while($res = mysqli_fetch_object($resultado5)) { ?>
                                                              <option  value="<?php echo $res->id_provincia; ?>"><?php echo $res->glosa_provincia; ?></option> 
                                                        <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input onclick="reclamo_inicio()" type="button" value="GUARDAR RECLAMO" class="btn btn-outline-success btn-lg btn-block">
                                            </div>

                                        </div>
                                    </form>
                                </div><!-- TERMINA EL  NAV DE CALIFICACION INICIAL-->

                                <div class="tab-pane fade" id="nav-calificacionFinal" role="tabpanel" aria-labelledby="nav-calificacionFinal">
                                    <form>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE RECLAMO :</label>
                                                <input id="txt_nroReclamo_termino" type="number" value="0" min="0" class="form-control" >
                                            </div>

                                            <div class="col-md-6">
                                            <label for="inputEmail4">NUEVO ESTADO :</label>
                                                <select id="cmb_estado_termino" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE ESTADO</option>
                                                    <?php while($res = mysqli_fetch_object($resultado3_1)) { ?>
                                                     <option  value="<?php echo $res->id_estado; ?>"><?php echo $res->glosa_estado; ?></option> 
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input  onclick="termino_reclamo()" class="btn btn-outline-success btn-lg btn-block" type="button" value="GUARDAR RECLAMO">
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- TERMINA EL NAV DE CALIFICACION FINAL-->
                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
                swal("Exito","La inserción se realizo correctamente","success"); 
            }
            else
            {
                swal("Error","La inserción nose pudo realizar correctamente","error");
            }
        });
    }
    else
    {
        swal("Recuerda","Debes completar todos los campos para su inserción","info");
    }

   
};

function termino_reclamo()
{
    var NroReclamo_termino = $("#txt_nroReclamo_termino").val();
    var Nuevo_estado = $("#cmb_estado_termino").val();

   $.post("funciones/reclamo_ingreso_termino.php",{nroReclamo_termino:NroReclamo_termino,nuevo_estado:Nuevo_estado},
   function (data)
   {
        if (data == 1)
        {
            swal("Exito","La inserción se realizo correctamente","success"); 
        }
        else
        {
            swal("Error","La inserción nose pudo realizar correctamente","error");
        }   
   });
};

</script>

