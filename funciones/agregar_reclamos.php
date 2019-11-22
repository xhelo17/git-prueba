<?php
include "../conector.php";

    $id_evento = $_POST["id_evento"];
    $nro_reclamo = $_POST["nro_reclamo"];
    $sistema_ingresa = $_POST["sistema_ingresa"];
    $causa = $_POST["causa"];
    $estado = $_POST["estado"];
    $zona = $_POST["zona"];
    $prefectura = $_POST["prefectura"];
/*
    $sql_insert_reclamo ="INSERT INTO 
                            carabinero_lesionado(id_evento, codigo_funcionario, lesiones_carabinero,
                            motivo_carabinero, parte_carabinero)
                        VALUES 
                            ($carabinero_evento,'$carabinero_codigo','$carabinero_lesiones','$carabinero_motivo',
                            $carabinero_nro_parte)";

    $resultado = ejecutaSQL_insert('conecta',$sql_insert_carabineros);
    */

    echo $id_evento,"\n",

    $resultado =1;
    if($resultado)
    {
        $dato = 1;
    }
    else{
        $dato=0;
    }
    echo json_decode ($dato);





?>