<?php
include "conector.php";
$sql_ingreso_motivo = "SELECT
                        tb_motivo.id_motivo,
                        tb_motivo.glosa_motivo
                        FROM
                        tb_motivo";
$resultado = ejecutaSQL_select("conecta",$sql_ingreso_motivo);

$sql_ingreso_tipo_evento ="SELECT
                        tb_tipoevento.id_tipoevento,
                        tb_tipoevento.glosa_tipoevento
                        FROM
                        tb_tipoevento";
$resultado1 =ejecutaSQL_select("conecta",$sql_ingreso_tipo_evento);

$sql_ingreso_personal ="SELECT
                        tb_personalintervino.id_intervino,
                        tb_personalintervino.glosa_intervino
                        FROM
                        tb_personalintervino";
$resultado2 =ejecutaSQL_select("conecta",$sql_ingreso_personal);

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
$resultado3 =ejecutaSQL_select("conecta",$sql_ingreso_zona);


$sql_ingreso_provincia="SELECT
                        tb_provincia.id_provincia,
                        tb_provincia.glosa_provincia
                        FROM
                        tb_provincia";
$resultado4 =ejecutaSQL_select("conecta",$sql_ingreso_provincia);

$sql_lista_evento ="SELECT
                    evento.id_evento
                    FROM
                    evento
                    ORDER BY id_evento DESC ";
$resultado5 = ejecutaSQL_select("conecta",$sql_lista_evento);
//Termino de consultas EVENTOS


$sql_detenidos_motivo="SELECT
                    tb_motivo_detencion.id_motivodetencion,
                    tb_motivo_detencion.glosa_motivodetencion
                    FROM
                    tb_motivo_detencion";
$resultado6 = ejecutaSQL_select("conecta",$sql_detenidos_motivo);


$sql_persona_evento ="SELECT
                    evento.id_evento
                    FROM
                    evento
                    ORDER BY id_evento DESC ";
$resultado7 = ejecutaSQL_select("conecta",$sql_persona_evento);
//Termino de consultas PERSONA

$sql_lesiones_persona="SELECT
                     tb_lesion.id_lesion,
                     tb_lesion.glosa_lesion
                     FROM
                     tb_lesion";
$resultado8 = ejecutaSQL_select("conecta",$sql_lesiones_persona);

$sql_motivo_lesiones="SELECT
                     tb_motivolesion.id_motivolesion,
                     tb_motivolesion.glosa_motivolesion
                     FROM
                     tb_motivolesion";

$resultado9 = ejecutaSQL_select("conecta",$sql_motivo_lesiones);

$sql_causa_persona="SELECT
                    tb_causalesion.id_causalesion,
                    tb_causalesion.glosa_causalesion
                    FROM
                    tb_causalesion";

$resultado10 = ejecutaSQL_select("conecta",$sql_causa_persona);


$resultado11= ejecutaSQL_select("conecta",$sql_motivo_lesiones);
$sql_motivo_lesiones_carabinero="SELECT
                                tb_motivolesion_carab.id_motivolesion,
                                tb_motivolesion_carab.glosa_motivolesion
                                FROM
                                tb_motivolesion_carab";
$resultado12=ejecutaSQL_select("conecta",$sql_motivo_lesiones_carabinero);
$resultado13=ejecutaSQL_select("conecta",$sql_lista_evento);
$resultado14= ejecutaSQL_select("conecta",$sql_lesiones_persona);
$resultado15=ejecutaSQL_select("conecta",$sql_lista_evento);
$sql_daños_tipos="SELECT
                    tb_tipodano.id_dano,
                    tb_tipodano.glosa_dano
                    FROM
                    tb_tipodano";
$resultado16 = ejecutaSQL_select("conecta",$sql_daños_tipos);

?>

<script src="js/llenarSelect.js"></script>
<script src="js/funcion_evento.js"></script>
<div class="content mt-3">
    <div class="row">
        <div class="card">
            <div class="col-md-12">
                <div class ="card-header">
                    <strong class="card-title">INGRESO DE EVENTO</strong>
                </div>

                <div class ="card-body">
                    <div class="default-tab">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                             <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-evento-tab" data-toggle="tab" href="#nav-evento" role="tab" aria-controls="nav-evento" aria-selected="true">EVENTO</a>
                                    <a class="nav-item nav-link" id="nav-detenidos-tab" data-toggle="tab" href="#nav-detenidos" role="tab" aria-controls="nav-detenidos" aria-selected="false">DETENIDOS</a>
                                    <a class="nav-item nav-link" id="nav-personas-tab" data-toggle="tab" href="#nav-personas" role="tab" aria-controls="nav-personas" aria-selected="false">PERSONAS LESIONADAS</a>
                                    <a class="nav-item nav-link" id="nav-carabineros-tab" data-toggle="tab" href="#nav-carabineros" role="tab" aria-controls="nav-carabineros" aria-selected="false">CARABINEROS LESIONADOS</a>
                                    <a class="nav-item nav-link" id="nav-daños-tab" data-toggle="tab" href="#nav-daños" role="tab" aria-controls="nav-daños" aria-selected="false">DAÑOS</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-evento" role="tabpanel" aria-labelledby="nav-evento-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail4">MOTIVO :</label>
                                                <select id="cmb_motivo" onkeyup="cmb_motivo" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE MOTIVO</option>
                                                        <?php while($res = mysqli_fetch_object($resultado)) { ?>
                                                              <option  value="<?php echo $res->id_motivo; ?>"><?php echo $res->glosa_motivo; ?></option> 
                                                        <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">TIPO DE EVENTO :</label>
                                                <select id="cmb_tipoEvento" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE EVENTO</option>
                                                    <?php while($res = mysqli_fetch_object($resultado1)) { ?>
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
                                                <select name="" id="cmb_autorizado" class="browser-default custom-select custom-select-lg mb-2">
                                                    <option value="0">SELECION DE AUTORIZACION</option>
                                                    <option value="si">si</option>
                                                    <option value="no">no</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">CANTIDAD DE ASISTENTES :</label>
                                                <input type="number"  value="0" class="form-control" id="txt_cant_asis">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4">PERSONAL QUE INTERVINO :</label>
                                                <select id="cmb_personalIntervino" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION PERSONAL QUE INTERVINO </option>
                                                    <?php while($res = mysqli_fetch_object($resultado2)) { ?>
                                                              <option  value="<?php echo $res->id_intervino; ?>"><?php echo $res->glosa_intervino; ?></option> 
                                                        <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ZONA :</label>
                                                <select id="cmb_zona" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE ZONA</option>
                                                    <?php while($res = mysqli_fetch_object($resultado3)) { ?>
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
                                                    <?php while($res = mysqli_fetch_object($resultado4)) {?>
                                                        <option value="<?php echo $res->id_provincia; ?>"><?php echo $res->glosa_provincia; ?></option>
                                                    <?php }?>                                                  
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                            <label for="inputEmail4">DESCRIPCION DEL EVENTO :</label>
                                            <input id="txt_descripcion_evento" class="form-control" type="text" maxlength="70" placeholder="ingresa una descripción (MAX 70 caracteres) ">
                                            </div>

                                            <div class="col-md-12">
                                            <br>
                                                <input type="button" value="GUARDAR EVENTO" onclick="guardar_evento()" class="btn btn-outline-success btn-lg btn-block" >
                                            </div>

                                        </div>
                                    </form>
                                </div><!-- TERMINA EL  NAV DE EVENTO-->

                                <div class="tab-pane fade" id="nav-detenidos" role="tabpanel" aria-labelledby="nav-detenidos">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ID EVENTO :</label>
                                                <select id="cmb_detenido_evento" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option selected>SELECCION DE ID EVENTO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado5)){?>
                                                    <option value="<?php echo $res->id_evento?>"><?php echo $res->id_evento?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">EDAD :</label>
                                                <input type="number" max="150" min="0" value="0" class="form-control" id="txt_edad_detenido">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4">GENERO :</label>
                                                <select id="cmb_detenido_genero" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE GENERO</option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="masculino">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">MOTIVO :</label>
                                                <select id="cmb_detenido_motivo" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option option value="0" selected>SELECCION DE MOTIVO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado6)){?>
                                                    <option value="<?php echo $res->id_motivodetencion?>"><?php echo $res->glosa_motivodetencion?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">LESIONES :</label>
                                                <select id="cmb_detenido_lesiones" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE LESIONES</option>
                                                    <?php while($res =mysqli_fetch_object($resultado11)){?>
                                                    <option value="<?php echo $res->id_motivolesion?>"><?php echo $res->glosa_motivolesion?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE PARTE ("0" SI NO EXISTE):</label>
                                                <input id="txt_detenido_nro_parte" type="number" min="0" value="0" class="form-control" >
                                            </div>
                                            <div class="col-md-12">
                                            <input type="button" value="GUARDAR EVENTO" onclick="guardar_detenidos()" class="btn btn-outline-success btn-lg btn-block" >
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- TERMINA EL NAV DE DETENIDOS-->


                                <div class="tab-pane fade" id="nav-personas" role="tabpanel" aria-labelledby="nav-personas-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ID EVENTO :</label>
                                                <select id="cmb_persona_evento" class="browser-default custom-select custom-select-lg mb-3">
                                                <option option value="0" selected>SELECCION DE ID EVENTO</option>
                                                <?php while($res =mysqli_fetch_object($resultado7)){?>
                                                    <option value="<?php echo $res->id_evento?>"><?php echo $res->id_evento?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">EDAD :</label>
                                                <input id="txt_persona_edad" type="number" min="0" max="150" value="0" class="form-control" id="txt_edadPersona">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputEmail4">GENERO :</label>
                                                <select id="cmb_persona_genero" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE GENERO</option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="Masculino">Masculino</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label  for="inputEmail4">LESIONES :</label>
                                                <select id="cmb_persona_lesiones" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE LESIONES</option>
                                                    <?php while($res =mysqli_fetch_object($resultado8)){?>
                                                    <option value="<?php echo $res->id_lesion?>"><?php echo $res->glosa_lesion?></option>
                                                    <?php } ?> 

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">CAUSA :</label>
                                                <select id="cmb_persona_causa" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE CAUSA</option>
                                                    <?php while($res =mysqli_fetch_object($resultado10)){?>
                                                    <option value="<?php echo $res->id_causalesion?>"><?php echo $res->glosa_causalesion?></option>
                                                    <?php } ?> 

                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">MOTIVO :</label>
                                                <select id="cmb_persona_motivo" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE MOTIVO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado9)){?>
                                                    <option value="<?php echo $res->id_motivolesion?>"><?php echo $res->glosa_motivolesion?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE PARTE ("0" SI NO EXISTE):</label>
                                                <input id="txt_persona_nro_parte" type="number" min="0" value="0" class="form-control" >
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <input onclick="guardar_perso_lesionadas()" class="btn btn-outline-success btn-lg btn-block" type="button"  value="GUARDAR EVENTO">
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- TERMINO DEL NAV PERSONA LESIONADA -->


                                <div class="tab-pane fade" id="nav-carabineros" role="tabpanel" aria-labelledby="nav-carabineros-tab">
                                    <form>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ID EVENTO :</label>
                                                <select id="cmb_carabinero_evento" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE ID EVENTO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado13)){?>
                                                    <option value="<?php echo $res->id_evento?>"><?php echo $res->id_evento?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">CODIGO :</label>
                                                <input type="text" class="form-control" id="txt_carabinero_codigo">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">LESIONES :</label>
                                                <select id="cmb_carabinero_lesiones" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE LESIONES</option>
                                                    <?php while($res =mysqli_fetch_object($resultado14)){?>
                                                    <option value="<?php echo $res->id_lesion?>"><?php echo $res->glosa_lesion?></option>
                                                    <?php } ?>  
                                                                                                         
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">MOTIVO :</label>
                                                <select id="cmb_carabinero_motivo" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option selected>SELECCION DE MOTIVO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado12)){?>
                                                    <option value="<?php echo $res->id_motivolesion?>"><?php echo $res->glosa_motivolesion?></option>
                                                    <?php } ?>  
                                                    </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">N° DE PARTE (0 SINO EXISTE)  :</label>
                                                <input  id="txt_carabinero_nro_parte" min="0" value="0" type="number" class="form-control" id="txt_nroParteCarab">
                                                
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <br>
                                                <input onclick="guardar_carabinero()" class="btn btn-outline-success btn-lg btn-block" type="button" value="GUARDAR EVENTO">
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- TERMINO DEL NAV CARABINERO LESIONADO-->


                                <div class="tab-pane fade" id="nav-daños" role="tabpanel" aria-labelledby="nav-carabineros-tab">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEmail4">ID EVENTO :</label>
                                                <select id="cmb_daños_lesiones" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE EVENTO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado15)){?>
                                                    <option value="<?php echo $res->id_evento?>"><?php echo $res->id_evento?></option>
                                                    <?php } ?> 
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEmail4">TIPO :</label>
                                                <select id="cmb_daños_motivo" class="browser-default custom-select custom-select-lg mb-3">
                                                    <option value="0" selected>SELECCION DE TIPO</option>
                                                    <?php while($res =mysqli_fetch_object($resultado16)){?>
                                                    <option value="<?php echo $res->id_dano?>"><?php echo $res->glosa_dano?></option>
                                                    <?php } ?> 
                                                </select>  
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                                <input onclick="guardar_daños()" type="button" value="GUARDAR EVENTO" class="btn btn-outline-success btn-lg btn-block">
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- TERMINO DEL NAV DAÑOS-->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





