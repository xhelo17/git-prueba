<?php
include "../conector.php";
$evento = $_POST["id"];
$tipo = $_POST["tipo"];

$sql_agregar_dano="INSERT INTO 
                   danos(id_evento, tipo_dano)
                   VALUES 
                   ($evento,'$tipo')";

$resultado = ejecutaSQL_insert('conecta',$sql_agregar_dano);
if ($resultado)
{
    $dato =1;
}else
{
    $dato=0;
}
echo json_decode ($dato);
?>