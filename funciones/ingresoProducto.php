
<?php
include "../conexion.php";
$conexion = conectar();
$producto = $_POST["producto"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];

$sql ="INSERT INTO producto( producto, stock, precio_unit, id_categoria)
       VALUES ('$producto','$stock','$precio',$categoria)";
$resultado = mysqli_query($conexion,$sql);
$dato = 0;
if (!$resultado) {
  $dato = 1;
}
echo json_decode ($dato);
 ?>
