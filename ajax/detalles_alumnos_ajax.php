<?php
include "../conexion.php";
$conexion = conectar();

$codigo = $_POST["codigo"];

	$sql_alumno= "SELECT
									rut,
									codigo,
									grado,
									nombre_Apellido
								FROM
								alumnos
								WHERE codigo='$codigo'";

$resul = mysqli_query($conexion,$sql_alumno);



$sql = "SELECT
				alumnos.codigo,
				alumnos.nombre_Apellido,
				asignatura.nombre_asignatura,
				asignatura.inicio,
				asignatura.termino,
				profesores.profe_nombre
			FROM
				alumnos
			INNER JOIN detalle_asignatura ON detalle_asignatura.id_alumno = alumnos.codigo
			INNER JOIN asignatura ON detalle_asignatura.id_asignatura = asignatura.id_asignatura
			INNER JOIN profesores ON asignatura.id_profesor = profesores.rut
			WHERE alumnos.codigo='$codigo'";

$resultado = mysqli_query($conexion,$sql);



$sql_notas = "SELECT
										alumnos.nombre_Apellido,
										detalle_asignatura.nota_1,
										detalle_asignatura.nota_2,
										detalle_asignatura.nota_3,
										detalle_asignatura.nota_4,
										detalle_asignatura.nota_5,
										detalle_asignatura.nota_examen,
										detalle_asignatura.nota_final,
										asignatura.nombre_asignatura,
										notas_detalles.nota_1_porcentaje,
										notas_detalles.nota_2_porcentaje,
										notas_detalles.nota_3_porcentaje,
										notas_detalles.nota_4_porcentaje,
										notas_detalles.nota_5_porcentaje,
										notas_detalles.examen_porcentaje
							FROM
									alumnos
							INNER JOIN detalle_asignatura ON detalle_asignatura.id_alumno = alumnos.codigo
							INNER JOIN asignatura ON detalle_asignatura.id_asignatura = asignatura.id_asignatura
							INNER JOIN notas_detalles ON notas_detalles.id_asignatura = asignatura.id_asignatura
							WHERE alumnos.codigo='$codigo'";

							$resultados = mysqli_query($conexion,$sql_notas);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 	<head>
 		<meta charset="utf-8">
 		<title></title>
		<link rel="apple-touch-icon" href="images/logo.png">
    <link rel="shortcut icon" href="images/logo.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">



 	</head>
 	<body>
		<div class="card">
			<div class="card-header">
					<strong class="card-title">
						<?php foreach ($resul as $nombre) {
							echo $nombre["grado"]," ",$nombre["nombre_Apellido"];
						} ?>
					</strong>
			</div>
			<div class="card-body">



										<div class="card">
											                            <div class="card-header">
											                                <strong class="card-title">RESUMEN DE ASIGNATURA </strong>
											                            </div>
											                            <div class="card-body">
											                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
											                        <thead>
											                          <tr>
											                            <th>ASIGNATURA</th>
											                            <th>INICIO</th>
											                            <th>TERMINO</th>
											                            <th>PROFESOR</th>
											                          </tr>
											                        </thead>
											                        <tbody>
											                            <?php foreach ($resultado as $asignatura){ ?>
											                          <tr>
											                              <td> <?php echo $asignatura["nombre_asignatura"]; ?></td>
											                              <td><?php echo $asignatura['inicio']?></td>
											                              <td><?php echo $asignatura['termino']?></td>
											                              <td><?php echo $asignatura['profe_nombre'] ?></td>
											                          </tr>
											                          <?php } ?>
											                        </tbody>
											                      </table>
											                            </div>
											                        </div>


										<div class="card">
											                            <div class="card-header">
											                                <strong class="card-title">RESUMEN DE NOTAS </strong>
											                            </div>
											                            <div class="card-body">
											                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
											                        <thead>
											                          <tr>
											                            <th>ASIGNATURA</th>
											                            <th>NOTA 1</th>
											                            <th>NOTA 2</th>
											                            <th>NOTA 3</th>
																									<th>NOTA 4</th>
																									<th>NOTA 5</th>
																									<th>NOTA EXAMEN</th>
																									<th>NOTA FINAL</th>
											                          </tr>
											                        </thead>
											                        <tbody>
											                            <?php foreach ($resultados as $detalles){ ?>
											                          <tr>
																									 <td> <?php echo $detalles["nombre_asignatura"]; ?></td>
											                              <td> <?php echo $detalles["nota_1"],"   (",$detalles["nota_1_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_2"],"   (",$detalles["nota_2_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_3"],"   (",$detalles["nota_3_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_4"],"   (",$detalles["nota_4_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_5"],"   (",$detalles["nota_5_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_examen"],"   (",$detalles["examen_porcentaje"],"%)"; ?></td>
																										<td> <?php echo $detalles["nota_final"]; ?></td>

											                          </tr>
											                          <?php } ?>
											                        </tbody>
											                      </table>
											                            </div>
									</div>
					</div>
	</div>

 	</body>
 </html>
