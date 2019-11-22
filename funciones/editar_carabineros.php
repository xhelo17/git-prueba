<?php
include "../conector.php";
$carabinero_evento = $_POST["id"];
$carabinero_codigo = $_POST["codigo"];
$carabinero_lesiones = $_POST["lesiones"];
$carabinero_motivo = $_POST["motivo"];
$carabinero_nro_parte = $_POST["nro_parte"];

$sql_agregar_carabinero="INSERT INTO 
                    carabinero_lesionado(id_evento, codigo_funcionario, lesiones_carabinero, motivo_carabinero,
                    parte_carabinero)
                    VALUES 
                    ($carabinero_evento,'$carabinero_codigo','$carabinero_lesiones','$carabinero_motivo',
                    $carabinero_nro_parte)";

$resultado = ejecutaSQL_insert('conecta',$sql_agregar_carabinero);
if ($resultado)
{
    $dato =1;
}else
{
    $dato=0;
}
echo json_decode ($dato);

?>