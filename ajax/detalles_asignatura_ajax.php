<?php

include "../conexion.php";
$conexion = conectar();
$codigo = $_POST["codigo"];


$sql_nombre_asig="SELECT id_asignatura, nombre_asignatura
                  FROM asignatura
                  WHERE id_asignatura ='$codigo'";
$resul = mysqli_query($conexion,$sql_nombre_asig);

$sql = "SELECT
        asignatura.nombre_asignatura,
        asignatura.inicio,
        asignatura.termino,
        alumnos.rut,
        alumnos.codigo,
        alumnos.grado,
        alumnos.nombre_Apellido,
        asignatura.id_asignatura
        FROM
        asignatura
        INNER JOIN detalle_asignatura ON detalle_asignatura.id_asignatura = asignatura.id_asignatura
        INNER JOIN alumnos ON detalle_asignatura.id_alumno = alumnos.codigo
        where asignatura.id_asignatura = '$codigo'";
$resultado = mysqli_query($conexion,$sql);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



    <div class="card">
        <div class="card-header">
            <strong class="card-title">
              <?php foreach ($resul as $asig)
              {echo $asig["nombre_asignatura"]; } ?>
            </strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                  <thead>
                        <tr>
                          <th>RUT</th>
                          <th>CODIGO</th>
                          <th>GRADO</th>
                          <th>ALUMNO</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($resultado as $alumno){ ?>
                        <tr>
                            <td> <?php echo $alumno["rut"]; ?></td>
                            <td><?php echo $alumno['codigo']?></td>
                            <td><?php echo $alumno['grado']?></td>
                            <td><?php echo $alumno['nombre_Apellido'] ?></td>
                        </tr>
                        <?php } ?>
                  </tbody>
           </table>
          </div>
       </div>



  </body>
 </html>
