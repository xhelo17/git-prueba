<?php
include "../conector.php";
$zona = $_POST['zona'];

$sql ="SELECT
        COMUNA.ID_COMUNA,
        COMUNA.DESCRIPCION_COMUNA,
        COMUNA.ESTADO_ELIMINACION,
        COMUNA.ID_PROVINCIA,
        PROVINCIA.ID_PROVINCIA,
        PROVINCIA.ID_REGION,
        PROVINCIA.DESCRIPCION_PROVINCIA,
        PROVINCIA.ESTADO_ELIMINACION,
        REGION.ID_REGION,
        REGION.DESCRIPCION_REGION,
        REGION.ESTADO_ELIMINACION
        FROM
        COMUNA ,
        REGION ,
        PROVINCIA
        where ID_COMUNA ="$zona"";

$resul =ejecutaSQL_select("conecta",$sql);

var_dump(mysqli_fetch_object($resul));
exit;
$cadena = '<label for="inputEmail4">COMISARIA :</label>
         <select id="cmb_comizaria" class="browser-default custom-select custom-select-lg mb-3">';

while ($dato = mysqli_fetch_object($resul))
{
    $cadena = $cadena."<option value=".$dato->ID_REGION.">.$dato->DESCRIPCION_REGION.</option>"
}

echo $cadena."</select>";


?>


                                               