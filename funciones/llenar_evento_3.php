<?php
include "../conector.php";
$sql_persona_evento ="SELECT
                    evento.id_evento
                    FROM
                    evento
                    ORDER BY id_evento DESC ";
$resultado15 = ejecutaSQL_select("conecta",$sql_persona_evento);
?>

<label for="inputEmail4">ID EVENTO :</label>
<select id="cmb_daños_lesiones" class="browser-default custom-select custom-select-lg mb-3">
<option value="0" selected>SELECCION DE EVENTO</option>
<?php while($res =mysqli_fetch_object($resultado15)){?>
<option value="<?php echo $res->id_evento?>"><?php echo $res->id_evento?></option>
<?php } ?>                                                     
</select>