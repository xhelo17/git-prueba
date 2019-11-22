<?php
include "../conexion.php";
$conexion = conectar();
$id = $_POST["id"];
$producto = $_POST["producto"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];


$sql ="UPDATE producto
       SET producto ='$producto',
       stock = '$stock',
       precio_unit = '$precio',
       id_categoria = '$categoria'
       WHERE id_producto = '$id'";


$resultado = mysqli_query($conexion,$sql);
$dato = 0;
if (!$resultado) {
  $dato = 1;
}
echo json_decode ($dato);
 ?>
