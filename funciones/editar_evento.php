<?php
include "../conector.php";
$id_editar = $_POST["id_editar"];
$motivo_editar = $_POST["motivo_editar"];
$tipo_evento_editar = $_POST["tipo_evento_editar"];
$fecha_inicio = $_POST["fecha_inicio"];
$hora_inicio = $_POST["hora_inicio"];
$Fecha_termino = $_POST["Fecha_termino"];
$hora_termino = $_POST["hora_termino"];
$autorizado_editar = $_POST["autorizado_editar"];
$cant_asistente = $_POST["cant_asistente"];
$perso_intervino = $_POST["perso_intervino"];
$zona_editar = $_POST["zona_editar"];
$comizaria_editar = $_POST["comizaria_editar"];
$provincia_editar = $_POST["provincia_editar"];





$resultado =0;
if($resultado)
{
    $dato = 1;
}
else
{
    $dato=0;
}
echo json_decode ($dato);

?>