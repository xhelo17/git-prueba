<?php
include 'conexion.php';
$conexion = conectar();
$sql="SELECT alumnos.rut, alumnos.codigo, alumnos.grado, alumnos.nombre_Apellido
      FROM alumnos
      ORDER BY nombre_Apellido ASC";

      $resultado = mysqli_query($conexion,$sql);
 ?>


<div class="content mt-3">
   <div class="card">
       <div class="card-header">
           <strong class="card-title">Seleccion de alumnos</strong>
       </div>
			 <div class="card-body">
          <div class="col-lg-6">
            <select  id="cbx_producto" name="cbx_producto" data-live-search="true" data-placeholder="Selecciona un alumno..." class="form-control" tabindex="1" >
              <option value="0">Selecciona un alumno...</option>
              <?php while($res = mysqli_fetch_object($resultado)) {?>
                <option  value="<?php echo $res->'codigo'; ?>"><?php echo $res->"grado"," ",$res->"nombre_Apellido"; ?></option>
             <?php } ?>
            </select>
          </div>
          <div class="col-lg-6" id="fecha">


          </div>
          <div class="col-lg-12">
            <br>
            <form class="" name="formulario" method="post">
              <p class="card-title">Opciones de Búsqueda</p>

            <input type="radio" id="opc1"name="opc" value="presente" >
            <label for="opc1">Presentes</label>

            <input type="radio" id="opc2"name="opc" value="ausentes" >
            <label for="opc2">Ausentes</label>

            <input type="radio" id="opc3"name="opc" value="ambos" checked>
            <label for="opc3">Ambos</label>
              </form>
          </div>

          <div class="col-lg-12">
              <br>
              <button type="button" onclick="h();" class="btn btn-success btn-lg btn-block"  name="button">Buscar</button>
          </div>
			 </div>
   </div>
   <div class="col-lg-12" id="datos" name="datos">

   </div>
</div>

<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
<script src="jquery/jquery-3.2.1.min.js" ></script>
<script src="jquery-ui/jquery-ui.min.js"></script>

<script src="assets/js/main.js"></script>

<script type="text/javascript">
  $(function(){
      $("#fecha").load("asd.php");
  });

  function h(){
    var Codigo = document.getElementById("cbx_producto").value;
    var Fecha = $("#datepicker").val();
    var opc = document.formulario.opc;
    for (var i = 0; i < opc.length; i++) {
      if(opc[i].checked){
        var Opc1=opc[i].value;
      }
    }

   $.post("ajax/detalle_asistenciaAlumno_ajax.php",{codigo:Codigo,fecha:Fecha,opc1:Opc1},
    function(data){
    $("#datos").html(data)
    });
  };

</script>
