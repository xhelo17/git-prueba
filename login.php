<?php
error_reporting(0);
session_start();
$variable_sesion = $_SESSION['usuario'];
if ($variable_sesion != null || $variable_sesion != "") {
  header("location:index.php");
}

 ?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/scss/style.css">
    <style media="screen">
      body{
        background-image:url("images/fondo.jpg");
        background-size: 100%, 100%;
        blackgrond-Attachment:fixed;
        background-repeat: no-repeat;
        background-position: center;


      }
    </style>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body >


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">

                      <img class="align-content" src="images/logo.png" alt="">

                </div>
                <div class="login-form">
                    <form id="login" action="inicio-sesion.php" >
                        <div class="form-group">
                            <label>Usuario</label>
                            <input id="usuario" name="usuario" type="text" class="form-control" placeholder="ingrese su nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Ingrese su contraseña">
                        </div>
                        <br>
                          <button  type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" >Conectar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="sweetalert2.js" charset="utf-8"></script>
    <script src="jquery/jquery.js" charset="utf-8"></script>





</body>
</html>
