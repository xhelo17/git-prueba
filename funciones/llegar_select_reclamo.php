<?php
include "../conector.php";
$zona = $_POST['zona'];

$sql ="SELECT
REPARTICION.CORRELATIVO,
REPARTICION.DESCRIPCION,
REPARTICION.ESTADO_VIGENCIA,
REPARTICION.CODIGO_ALTA_REPARTICION
FROM
REPARTICION
where
REPARTICION.CODIGO_ALTA_REPARTICION=".$zona."";

$resul =ejecutaSQL_select("conecta",$sql);

$label = " <label for='inputEmail4'>COMISARIA. :</label>";
echo $label;


$combo = " <select id='cmb_comizaria' class='browser-default custom-select custom-select-lg mb-3'>";


while ($dato = mysqli_fetch_object($resul))
{
    $combo .="<option value=".$dato->CORRELATIVO.">".$dato->DESCRIPCION."</option>";
}
$combo .="</select>";


echo $combo;

?>
