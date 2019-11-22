<?php
include "../conector.php";

    $id = $_POST["id"];
    $nro_reclamo = $_POST["nro_reclamo"];
    $nuevo_estado = $_POST["nuevo_estado"];
  
/*
    $sql_insert_reclamo ="INSERT INTO 
                            carabinero_lesionado(id_evento, codigo_funcionario, lesiones_carabinero,
                            motivo_carabinero, parte_carabinero)
                        VALUES 
                            ($carabinero_evento,'$carabinero_codigo','$carabinero_lesiones','$carabinero_motivo',
                            $carabinero_nro_parte)";

    $resultado = ejecutaSQL_insert('conecta',$sql_insert_carabineros);
*/    
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