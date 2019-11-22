<?php
include "../conector.php";

$carabinero_evento = $_POST["carabinero_evento"];
$carabinero_codigo = $_POST["carabinero_codigo"];
$carabinero_lesiones = $_POST["carabinero_lesiones"];
$carabinero_motivo = $_POST["carabinero_motivo"];
$carabinero_nro_parte = $_POST["carabinero_nro_parte"];

$sql_insert_carabineros ="INSERT INTO 
                        carabinero_lesionado(id_evento, codigo_funcionario, lesiones_carabinero,
                        motivo_carabinero, parte_carabinero)
                       VALUES 
                        ($carabinero_evento,'$carabinero_codigo','$carabinero_lesiones','$carabinero_motivo',
                        $carabinero_nro_parte)";

$resultado = ejecutaSQL_insert('conecta',$sql_insert_carabineros);
if($resultado)
{
    $dato = 1;
}
else{
    $dato=0;
}
echo json_decode ($dato);
?>