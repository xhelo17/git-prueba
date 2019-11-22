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
                                                <label for="inputEmail4">N° DE RECLAMO :</label>
                                                <input type="number" value="0" min="0" class="form-control" id="txt_nroReclamo">
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
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input onclick="guardar_inicio_reclamo()" type="button" value="GUARDAR RECLAMO" class="btn btn-outline-success btn-lg btn-block">
                                            </div>

                                        </div>
                                    </form>
                                </div><!-- TERMINA EL  NAV DE CALIFICACION INICIAL-->

                                <div class="tab-pane fade" id="nav-calificacionFinal" role="tabpanel" aria-labelledby="nav-calificacionFinal">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ID DE EVENTO :</label><br>  
                                                <div class="alert alert-success" role="alert">
                                                    <?php  while($res = mysqli_fetch_object($resultados1)){   ?>
                                                    <h4 class="alert-heading"><?php echo $res->id_evento; ?></h4>
                                                    <?php echo $res->descripcion_evento;?>
                                                    <?php }?>
                                                </div>

                                                <input type="hidden" value="<?php echo $id;?>" id="txt_id_evento1">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE RECLAMO :</label>
                                                <input type="number" value="0" min="0" class="form-control" id="txt_nroReclamo1">
                                            </div>

                                            <div class="col-md-6">
                                            <label for="inputEmail4">NUEVO ESTADO :</label>
                                                <select id="cmb_estado1" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE ESTADO</option>
                                                    <?php while($res = mysqli_fetch_object($resultado3_1)) { ?>
                                                     <option  value="<?php echo $res->id_estado; ?>"><?php echo $res->glosa_estado; ?></option> 
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <input  onclick="guardar_termino_reclamo()" class="btn btn-outline-success btn-lg btn-block" type="button" value="GUARDAR RECLAMO">
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
<script src="js/agregar_reclamos.js"></script>