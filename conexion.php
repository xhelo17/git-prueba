<?php
function conectar(){
  $direcion = "localhost";
  $usuario = "fcop2019";
  $clave = "fcop2019";
  $db = "DB_Fcop";

  $conexion = mysqli_connect($direcion,$usuario,$clave,$db) or die("Hubo un error al conectarse a la base de datos".mysql_error());
  return $conexion;
}

 ?>
