<?php
include "../conector.php";

    $nroReclamo_termino = $_POST["nroReclamo_termino"];
    $nuevo_estado = $_POST["nuevo_estado"];

/*
    $sql_insert_reclamo_sin ="INSERT INTO 
                            reclamos_sin(numero_reclamo, sistema, causa, estado, zona, prefectura)
                            VALUES 
                            ($nro_reclamo_inicio,'$sistema_ingreso','$causa','$estado_inicio',
                            '$zona','$prefectura')";

    $resultado = ejecutaSQL_insert('conecta',$sql_insert_reclamo_sin);
 */
    $sql_select = "SELECT * FROM reclamos_sin WHERE numero_reclamo = $nroReclamo_termino";
    $resul_sql = ejecutaSQL_select("conecta",$sql_select);

    if ($resul_sql)
    {
        echo = "paso el if";
    }
    else 
    {
        echo =" estamos en el else";
    }
    




    /*
    if($resultado)
    {
        $dato = 1;
    }
    else{
        $dato=0;
    }
    echo json_decode ($dato);

echo $nroReclamo_termino,"\n",$nuevo_estado;
*/
?>