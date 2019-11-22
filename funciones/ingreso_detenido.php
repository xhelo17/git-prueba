<?php 
include "../conector.php";
$detenido_evento = $_POST["detenido_evento"];
$detenido_edad = $_POST["detenido_edad"];
$detenido_genero = $_POST["detenido_genero"];
$detenido_motivo = $_POST["detenido_motivo"];
$detenido_lesiones = $_POST["detenido_lesiones"]; 
$detenido_nro_parte = $_POST["detenido_nro_parte"]; 


$sql_insert_detenido ="INSERT INTO 
                        detenido(id_evento, edad_detenido, genero_detenido, motivo_detenido, lesiones_detenido,
                        parte_detenido)
                       VALUES 
                        ($detenido_evento,$detenido_edad,'$detenido_genero','$detenido_motivo',
                        '$detenido_lesiones',$detenido_nro_parte)";

$resultado = ejecutaSQL_insert('conecta',$sql_insert_detenido);
if($resultado)
{
    $dato = 1;
}
else{
    $dato=0;
}
echo json_decode ($dato);

?>