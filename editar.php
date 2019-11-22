<?php
include 'conexion.php';
$conexion = conectar();
$sql="SELECT
	    producto.id_producto,
	    producto.producto
      FROM
	    producto
      ORDER BY producto ASC";

      $resultado = mysqli_query($conexion,$sql);


 ?>





 <link rel="apple-touch-icon" href="apple-icon.png">
 <link rel="shortcut icon" href="favicon.ico">

 <link rel="stylesheet" href="assets/css/normalize.css">
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/font-awesome.min.css">
 <link rel="stylesheet" href="assets/css/themify-icons.css">
 <link rel="stylesheet" href="assets/css/flag-icon.min.css">
 <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
 <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
 <link rel="stylesheet" href="assets/scss/style.css">
 <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">
 <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
<div class="content mt-3">
   <div class="card">
       <div class="card-header">
           <strong class="card-title">Seleccion de producto</strong>
       </div>
			 <div class="card-body">
				 	<form class="" action="funciones/buscarProducto_ajax.php" method="post">
				       <select  id="cbx_producto" name="cbx_producto" data-live-search="true" data-placeholder="Selecciona el Producto a Editar..." class="form-control" tabindex="1" >
				         <option value="0"></option>
				         <?php foreach ($resultado as $producto) {?>
				           <option  value="<?php echo $producto['id_producto'] ?>"><?php echo $producto['producto'] ?></option>
				      	<?php   } ?>
				    	</select>
							<br>
							<button type="submit" class="btn btn-success btn-lg btn-block"  name="button">Buscar</button>
			</form>
			 </div>

   </div>


</div>
<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

  <!--<script src="sweetalert2.js" charset="utf-8"></script>-->
