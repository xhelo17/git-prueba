<?php
include "conector.php";
$por_pagina =15;
if (isset($_GET['pagina']))
{
  $pagina = $_GET['pagina'];
}
else
{
  $pagina = 1;
}

$empieza = ($pagina-1)* $por_pagina;

$sql_lista_evento ="SELECT
                    evento.id_evento,
                    evento.tipo_evento,
                    evento.zona,
                    evento.fecha_inicio,
                    evento.descripcion_evento
                    FROM
                    evento
                    ORDER BY id_evento DESC
                    LIMIT $empieza,$por_pagina";
$resultado = ejecutaSQL_select("conecta",$sql_lista_evento);
$res = mysqli_fetch_object($resultado);




 ?>
 <!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>&nbsp;Fcop</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <!--<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">-->
    <!--<script src="boostrap/js/bootstrap.min.js"></script>-->
    
    <script src="sweetalert2.js" charset="utf-8"></script>

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <h3 class="menu-title">Lista de menus</h3><!-- /.menu-title -->
                    <li><a href="#" onclick="cambiaContenido('eventos_ingreso.php')" style="text-decoration:none"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;AGREGAR NUEVO EVENTO</a></li>
                    <li><a href="#" onclick="cambiaContenido('reclamo_ingreso.php')" style="text-decoration:none"><i class="fa fa-id-badge"></i>&nbsp; AGREGAR RECLAMO PROCEDIMIENTO POLICIAL</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                  <!--  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>-->
                  <?php// echo"Bienvenido ",$variable_sesion ;?>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/logo.png" alt="User Avatar">
                        </a>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>FORMULARIO AUTOMATIZADO EN PROCEDIMIENTOS</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Pagina Principal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="contenido_web" id="contenido_pagina" >
        <div class="content mt-3">
               <div class="animated fadeIn">
                   <div class="row">

                   <div class="col-md-12">
                       <!--  <label for="" >AGREGAR NUEVO EVENTO  <button class="btn btn-outline-info" onclick="cambiaContenido('eventos_ingreso.php')">+</button></label><br>
                        <label for="">AGREGAR RECLAMO PROCEDIMIENTO POLICIAL <button class="btn btn-outline-info" onclick="cambiaContenido('reclamo_ingreso.php')">+</button></label> -->
                       <div class="card">
                           <div class="card-header">
                               <strong class="card-title">LISTA DE EVENTO</strong>
                           </div>
                           <div class="card-body">

                             <table  class="table table-striped table-bordered small text-justify list-inline">
                               <thead>
                                 <tr>
                                   <th>ID</th>
                                   <th>DESCRIPCION</th>
                                   <th >TIPO</th>
                                   <th >ZONA</th>
                                   <th >FECHA..</th>
                                   <th >ACCION</th>
                                   <th >AGREGAR</th>
                                 </tr>
                               </thead>
                               <tbody>
                                   <?php while($res = mysqli_fetch_object($resultado)){ ?>
                                 <tr>
                                     <td><?php echo $res->id_evento; ?></td>
                                     <td><?php echo $res->descripcion_evento; ?></td>
                                     <td><?php echo $res->tipo_evento;?> </td>
                                     <td><?php echo $res->zona;?></td>
                                     <td><?php echo $res->fecha_inicio; ?></td>
                                     <td><button onclick="accion('<?php echo $res->id_evento; ?>')" class="btn btn-outline-info"><i class="fa fa-magic"></i>MODIFICAR</button></td>
                                     <td><button onclick="agregar('<?php echo $res->id_evento; ?>')" type="button" class="btn btn-outline-danger">RECLAMO</button></td>
                                 </tr>
                                 <?php } ?>
                               </tbody>
                             </table>
                                <nav aria-label="Page navigation example">
                                  <?php $sql = "SELECT * FROM evento";
                                  $resultado = ejecutaSQL_select("conecta",$sql);

                                  $total_registros = mysqli_num_rows($resultado);
                                  $total_paginas = ceil($total_registros / $por_pagina);
                                  ?> 
                                <ul class="pagination">
                                   <li class="page-item"><a href='PRUEBAS.php?pagina=1'>Primera</a></li>
                                    <?php
                                  for ($i=1; $i<=$total_paginas; $i++)
                                  { 
                                     echo "<li class='page-item'>"."<a href='PRUEBAS.php?pagina=".$i."'>".$i."</a>"."</li>";

                                  }?>
                                  <li class="page-item"><a href='PRUEBAS.php?pagina=<?php$total_paginas?>'>Última</a></li>
                                  
                                  </ul>
                                </nav>
                           </div>
                       </div>
                   </div>


                   </div>
               </div><!-- .animated -->

           </div><!-- .content -->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script>
         function cambiaContenido(url){
            $.post(url,{ nombre_func: 'hola hola amigo' } ,function(data) {
                $("#contenido_pagina").html(data);
            });
            }


        function accion(Id)
        {
            $.post("evento_editar.php",{id:Id},
                function(data)
                {

            });
        };


        function agregar(ID)
        {
            $.post("reclamo_agregar.php",{id:ID},
                function(data)
                {
                    $("#contenido_pagina").html(data);
                });
        };
    </script>




</body>

</html>