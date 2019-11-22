<?php
include "../conector.php";
$detenido_evento = $_POST["id"];
$detenido_edad = $_POST["edad"];
$detenido_genero = $_POST["genero"];
$detenido_motivo = $_POST["motivo"];
$detenido_lesiones = $_POST["lesiones"]; 
$detenido_nro_parte = $_POST["nro_parte"]; 



$sql_agregar_persona="INSERT INTO 
                    detenido(id_evento, edad_detenido, genero_detenido, motivo_detenido,lesiones_detenido, parte_detenido)
                    VALUES 
                    ($detenido_evento,$detenido_edad,'$detenido_genero','$detenido_motivo',
                    '$detenido_lesiones', $detenido_nro_parte)";

$resultado = ejecutaSQL_insert('conecta',$sql_agregar_persona);
if ($resultado)
{
    $dato =1;
}else
{
    $dato=0;
}
echo json_decode ($dato);

?>