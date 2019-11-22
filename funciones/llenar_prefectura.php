<?php
include "../conector.php";
$zona = $_POST['zona'];

$sql ="SELECT
        REPARTICION.CORRELATIVO,
        REPARTICION.ID_TIPO,
        REPARTICION.DESCRIPCION,
        REPARTICION.ESTADO_VIGENCIA,
        REPARTICION.CODIGO_DEPENDENCIA
        FROM
        REPARTICION
        WHERE
        REPARTICION.ESTADO_VIGENCIA ='0'AND
        REPARTICION.ID_TIPO = '43' AND
        REPARTICION.CODIGO_DEPENDENCIA ='$zona'";



$resul =ejecutaSQL_select("conecta",$sql);

$label = " <label for='inputEmail4'>PREFECTURA. :</label>";
echo $label;


$combo = " <select id='cmb_comizaria' class='browser-default custom-select custom-select-lg mb-3'>";


while ($dato = mysqli_fetch_object($resul))
{
    $combo .="<option value=".$dato->CORRELATIVO.">".$dato->DESCRIPCION."</option>";
}
$combo .="</select>";


echo $combo;

?>
