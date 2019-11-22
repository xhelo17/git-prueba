<script src="../jquery/jquery.js" charset="utf-8"></script>
<script src="../sweetalert2.js" charset="utf-8"></script>
<?php
include '../conexion.php';
$conexion = conectar();
$producto = $_POST['cbx_producto'];
?>

<!doctype html>
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

     <link rel="apple-touch-icon" href="../apple-icon.png">
     <link rel="shortcut icon" href="../favicon.ico">

     <link rel="stylesheet" href="../assets/css/normalize.css">
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
     <link rel="stylesheet" href="../assets/css/themify-icons.css">
     <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
     <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
     <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
     <link rel="stylesheet" href="../assets/scss/style.css">
     <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

     <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

 </head>


<?php
if ($producto ==0) {
  ?>

    <div class="card">
      <div class="card-body">
        <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Que mal!</h4>
              <p>Ups, ha ocurrido un error que no permite actualizar el producto.</p>
                <hr>
                  <p class="mb-0">Recuerda escoger un producto para poder actualizarlo .</p>
        </div>
        <div class="col-lg-12">
          <a href="../index.php">
          <button type="button" class="btn btn-info btn-lg btn-block" > <i class="ti-home"></i>&nbsp;volver al inicio</button>
          </a>
        </div>
      </div>
    </div>

  <?php
}
else {


        $sql="SELECT
        producto.id_producto,
        producto.producto,
        producto.stock,
        producto.precio_unit,
        categoria.`nombre-categoria`,
        categoria.id_categoria
        FROM
        categoria
        INNER JOIN producto ON producto.id_categoria = categoria.id_categoria
        WHERE id_producto = '$producto'";

        $resultados = mysqli_query($conexion,$sql);

        $sql_categoria = "SELECT categoria.id_categoria,
                          categoria.'nombre-categoria'
                          FROM categoria";
        $resultado_categoria = mysqli_query($conexion,$sql);


         ?>

         <body>
        <div class="card">

        <br>


        <div class="card-body">


           <div class="row">

                     <div class="col-lg-12">
                             <div class="alert alert-success" role="alert">
                                 <h4 class="alert-heading">id Producto:</h4>
                                  <?php foreach ($resultados as $busqueda) {?>
                                  <label for="text-input" class=" form-control-label"><?php echo $busqueda["id_producto"]; ?></label>
                                  <input type="hidden" name="id" id="id" value="<?php echo $busqueda["id_producto"]; ?>">
                                  <?php   } ?>
                              </div>
                     </div>
                       <div class="col-lg-6">
                         <section class="card">
                             <div class="card-body text-secondary">
                               <label for="text-input" class=" form-control-label">Producto:</label>
                               <?php foreach ($resultados as $busqueda) {?>
                               <input type="text" id="producto" name="producto" value="<?php echo $busqueda["producto"]; ?>" class="form-control">
                               <?php   } ?>
                             </div>
                         </section>
                       </div>
                        <div class="col-lg-6">
                            <section class="card">
                                <div class="card-body text-secondary">
                                  <label for="text-input" class=" form-control-label">Categorias:</label>
                                  <select name="categoria" id="categoria" class="form-control">
                                    <option value="0">Seleccione una categoria</option>
                                      <?php foreach ($resultado_categoria as $categoria) { ?>
                                      <option value="<?php echo $categoria['id_categoria'];?>"><?php echo $categoria["nombre-categoria"]; ?></option>
                                      <?php    } ?>
                                    </select>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-6">
                          <section class="card">
                              <div class="card-body text-secondary">
                                <label for="text-input" class=" form-control-label">Precio unitario:</label>
                                <?php foreach ($resultados as $busqueda) {?>
                                <input type="text" id="precio" name="precio" value="<?php echo $busqueda["precio_unit"]; ?>" class="form-control">
                                <?php   } ?>
                              </div>
                          </section>
                        </div>
                        <div class="col-lg-6">
                          <section class="card">
                              <div class="card-body text-secondary">
                                <label for="text-input" class=" form-control-label">Stock Inicial:</label>
                                  <?php foreach ($resultados as $busqueda) {?>
                                <input type="text" id="stock" name="stock" value="<?php echo $busqueda["stock"]; ?>" class="form-control">
                                <?php   } ?>
                              </div>
                          </section>
                        </div>
                        <div class="col-lg-5">
                          <button type="button" class="btn btn-success btn-lg btn-block" onClick="h ()"> <i class="ti-save"></i>&nbsp;actualizar Producto</button>
                        </div>
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-5">
                          <a href="../index.php">
                          <button type="button" class="btn btn-info btn-lg btn-block" > <i class="ti-home"></i>&nbsp;volver al inicio</button>
                          </a>
                        </div>

                  </div>
                  </div>
                  </div>





         </body>
         </html>
<?php } ?>

<script type="text/javascript">

  function h (){

    var Id = $("#id").val();
    var Producto = $("#producto").val();
    var Categoria = $("#categoria").val();
    var Precio = $("#precio").val();
    var Stock = $("#stock").val();
    if (Id!=0) {
          $.post('actualizarProducto_ajax.php',{id:Id,producto:Producto,categoria:Categoria,precio:Precio,stock:Stock},
         function(data){
           if (data == 0) {
             swal('Genial!','Todo salio bien!','success');
              $("#producto").val("");
              $("#categoria").val(0);
              $("#precio").val("");
              $("#stock").val("");

           } else {
             swal('Oops...','Algo salio mal!','error');


           }
         });}
      else {
           swal('Oops...','No has Seleccionado una categoria valida!','error');
       }
    }
</script>
