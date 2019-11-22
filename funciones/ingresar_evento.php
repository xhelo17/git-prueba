<?php 
include "../conector.php";
$motivo = $_POST["motivo"];
$evento = $_POST["evento"];
$f_inicio = $_POST["f_inicio"];
$h_inicio = $_POST["h_inicio"];
$f_termino = $_POST["f_termino"]; 
$h_termino = $_POST["h_termino"]; 
$autorizado = $_POST["autorizado"];
$cant_asis = $_POST["cant_asis"]; 
$per_inter = $_POST["per_inter"]; 
$zona = $_POST["zona"];
$comizaria = $_POST["comizaria"]; 
$provincia = $_POST["provincia"];
$date =date("Y-m-d");
//$cod_func = $_POST["cod_func"];
$cod_func ="prueba";
$descripcion = $_POST["descripcion"];

$sql_insert_evento ="INSERT INTO evento( motivo, tipo_evento, fecha_inicio, fecha_termino, hora_inicio,
                    hora_termino, autorizado, cantidad_asistentes, personal_intervino, zona, provincia,
                    comisaria, cod_fun_ingreso, fecha_ingreso,descripcion_evento)
                    VALUES ('$motivo','$evento','$f_inicio','$f_termino','$h_inicio','$h_termino',
                    '$autorizado',$cant_asis,'$per_inter','$zona','$provincia','$comizaria',
                    '$cod_func','$date','$descripcion')";

$resultado = ejecutaSQL_insert('conecta',$sql_insert_evento);
if($resultado)
{
    $dato = 1;
}
else{
    $dato=0;
}
echo json_decode ($dato);
?>