<?php
$conexion = mysqli_connect("localhost","root","","esucar2") or die("Error al conectar a al base de datos".mysql_error());
$usuario = $_GET['usuario'];
$pass = $_GET['password'];
$clave = md5($pass);
//error_reporting(0);
session_start();
$_SESSION['usuario'] = $usuario;

$variable_sesion = $_SESSION['usuario'];
if ($variable_sesion == null || $variable_sesion == "")
{
  header("location:login.php");
}
else{


    $sql = "SELECT
            usuarios.usuario,
            usuarios.clave
            FROM
            usuarios
            WHERE usuario='$usuario' and clave= '$clave'";

    $resultado = mysqli_query($conexion,$sql);
    $num_resultados = mysqli_num_rows($resultado);
    $_resultado= Array();
    echo $num_resultados;
    if ($num_resultados>0) {

      header("location:index.php");

        }
        else {
           session_destroy();
          //  header("location:login.php");
          echo "algo salio mal";
        }
      }
      mysqli_free_result($resultado);
      mysqli_close($conexion);
?>
