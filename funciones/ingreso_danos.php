<?php
include "../conector.php";

$daños_lesiones = $_POST["daños_lesiones"];
$daños_motivo = $_POST["daños_motivo"];

$sql_insert_danos ="INSERT INTO 
                        danos(id_evento, tipo_dano)
                       VALUES 
                        ($daños_lesiones,'$daños_motivo')";

$resultado = ejecutaSQL_insert('conecta',$sql_insert_danos);
if($resultado)
{
    $dato = 1;
}
else{
    $dato=0;
}
echo json_decode ($dato);
?>