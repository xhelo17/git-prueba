<?php
include "../conector.php";

    $nro_reclamo_inicio = $_POST["nro_reclamo_inicio"];
    $sistema_ingreso = $_POST["sistema_ingreso"];
    $causa = $_POST["causa"];
    $estado_inicio = $_POST["estado_inicio"];
    $zona = $_POST["zona"];
    $prefectura = $_POST["prefectura"];

    $sql_insert_reclamo_sin ="INSERT INTO 
                            reclamos_sin(numero_reclamo, sistema, causa, estado, zona, prefectura)
                            VALUES 
                            ($nro_reclamo_inicio,'$sistema_ingreso','$causa','$estado_inicio',
                            '$zona','$prefectura')";

    $resultado = ejecutaSQL_insert('conecta',$sql_insert_reclamo_sin);
 
    if($resultado)
    {
        $dato = 1;
    }
    else{
        $dato=0;
    }
    echo json_decode ($dato);
?>