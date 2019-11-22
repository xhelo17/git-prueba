<?php
include "../conector.php";

$persona_evento = $_POST["persona_evento"];
$persona_edad = $_POST["persona_edad"];
$persona_genero = $_POST["persona_genero"];
$persona_lesiones = $_POST["persona_lesiones"];
$persona_causa = $_POST["persona_causa"]; 
$persona_motivo = $_POST["persona_motivo"]; 
$persona_nro_parte = $_POST["persona_nro_parte"];

$sql_insert_persona ="INSERT INTO 
                        persona_lesionada(id_evento, edad_persona, genero_persona, lesiones_persona,
                        causa_persona,motivo_persona,parte)
                       VALUES 
                        ($persona_evento,$persona_edad,'$persona_genero','$persona_lesiones',
                        '$persona_causa',$persona_motivo,$persona_nro_parte)";

$resultado = ejecutaSQL_insert('conecta',$sql_insert_persona);
if($resultado)
{
    $dato = 1;
}
else{
    $dato=0;
}
echo json_decode ($dato);
?>