<?php
include "../conector.php";
$persona_evento = $_POST["id"];
$persona_edad = $_POST["edad"];
$persona_genero = $_POST["genero"];
$persona_lesiones = $_POST["lesiones"];
$persona_causa = $_POST["causa"];
$persona_motivo = $_POST["motivo"]; 
$persona_nro_parte = $_POST["nro_parte"]; 


$sql_agregar_persona="INSERT INTO 
                    persona_lesionada(id_evento, edad_persona, genero_persona, lesiones_persona, causa_persona,
                    motivo_persona, parte)
                    VALUES 
                    ($persona_evento,$persona_edad,'$persona_genero','$persona_lesiones','$persona_causa'
                    ,'$persona_motivo', $persona_nro_parte)";

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