<?php
include '../conexion.php';
$conexion = conectar();

$codigo = $_POST["codigo"];
$fecha = $_POST["fecha"];
$opc = $_POST["opc1"];

if ($fecha!="") {

	if ($opc =="ambos")
	{
			$sql = "SELECT
				asignatura.nombre_asignatura,
				asistencia.id_asistencia,
				asistencia.estado,
				asistencia.motivo,
				asistencia.fecha,
				alumnos.rut,
				alumnos.codigo,
				alumnos.grado,
				alumnos.nombre_Apellido
			FROM
				asignatura
			INNER JOIN asistencia ON asistencia.id_asisgnatura = asignatura.id_asignatura
			INNER JOIN alumnos ON asistencia.id_alumno = alumnos.codigo
			WHERE alumnos.codigo = '$codigo' and asistencia.fecha = '$fecha'";
	}
	if ($opc =="ausentes")
	{
				$sql = "SELECT
						asignatura.nombre_asignatura,
						asistencia.id_asistencia,
						asistencia.estado,
						asistencia.motivo,
						asistencia.fecha,
						alumnos.rut,
						alumnos.codigo,
						alumnos.grado,
						alumnos.nombre_Apellido
					FROM
						asignatura
					INNER JOIN asistencia ON asistencia.id_asisgnatura = asignatura.id_asignatura
					INNER JOIN alumnos ON asistencia.id_alumno = alumnos.codigo
					WHERE alumnos.codigo = '$codigo' and asistencia.fecha = '$fecha' AND asistencia.estado ='ausente'";
	}
	if ($opc =="presente")
	{
			$sql = "SELECT
					asignatura.nombre_asignatura,
					asistencia.id_asistencia,
					asistencia.estado,
					asistencia.motivo,
					asistencia.fecha,
					alumnos.rut,
					alumnos.codigo,
					alumnos.grado,
					alumnos.nombre_Apellido
				FROM
					asignatura
				INNER JOIN asistencia ON asistencia.id_asisgnatura = asignatura.id_asignatura
				INNER JOIN alumnos ON asistencia.id_alumno = alumnos.codigo
				WHERE alumnos.codigo = '$codigo' and asistencia.fecha = '$fecha' AND asistencia.estado ='presente'";
	}



$resultado = mysqli_query($conexion,$sql);

 ?>

   <div class="content mt-3">

     <div class="card">
       <div class="card-header">
         <strong class="card-title">asistencias</strong>
       </div>
       <div class="card-body">
         <div class="col-lg-12">
           <table id="bootstrap-data-table" class="table table-striped table-bordered">
             <thead>
               <tr>
                 <th>ASIGNATURA</th>
                 <th>ESTADO</th>
                 <th>MOTIVO</th>
                 <th>FECHA</th>
                 <th>ALUMNO</th>
                 <th>RUT</th>
                 <th>CODIGO</th>
                 <th>id</th>
               </tr>
             </thead>
             <tbody>
                 <?php foreach ($resultado as $asistencia){ ?>
               <tr>
                   <td><?php echo $asistencia["nombre_asignatura"]; ?></td>
                   <td><?php echo $asistencia['estado'] ?></td>
                   <td><?php echo $asistencia['motivo'] ?></td>
                   <td><?php echo $asistencia['fecha'] ?></td>
                   <td><?php echo $asistencia['nombre_Apellido'] ?></td>
                   <td><?php echo $asistencia['rut'] ?></td>
                   <td><?php echo $asistencia['codigo'] ?></td>
                   <td><?php echo $asistencia['id_asistencia'] ?></td>
               </tr>
               <?php } ?>
             </tbody>
           </table>
          </div>
        </div>
      </div>

  </div>


  <script src="jquery/jquery.js" charset="utf-8"></script>
  <script src="sweetalert2.js" charset="utf-8"></script>
	<?php }
	else {?>

		<div class="card">
			<div class="card-body">
				<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading">Que mal!</h4>
							<p>Ups, ha ocurrido un error que no permite buscar datos en la base de datos.</p>
								<hr>
									<p class="mb-0">Recuerda seleccionar una fecha valida para buscar.</p>
				</div>

			</div>
		</div>


<?php	} ?>
