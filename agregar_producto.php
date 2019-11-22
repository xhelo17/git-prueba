
<script src="jquery/jquery.js" charset="utf-8"></script>
<script src="sweetalert2.js" charset="utf-8"></script>
<?php include 'conexion.php';
$conexion = conectar();
$sql = "SELECT
        categoria.id_categoria,
        categoria.`nombre-categoria`
        FROM
        categoria";
$resultado = mysqli_query($conexion,$sql);

 ?>

   <div class="content mt-3">
     <div class="row">
        <div class="col-lg-6">
          <section class="card">
              <div class="card-body text-secondary">
                <label for="text-input" class=" form-control-label">Producto:</label>
                <input type="text" id="producto" name="producto" placeholder="Ingrese el nombre del producto" class="form-control">
              </div>
          </section>
        </div>
         <div class="col-lg-6">
             <section class="card">
                 <div class="card-body text-secondary">
                   <label for="text-input" class=" form-control-label">Categorias:</label>
                   <select name="categoria" id="categoria" class="form-control">
                     <option value="0">Seleccione una categoria</option>
                     <?php foreach ($resultado as $categoria) {?>
                       <option value="<?php echo $categoria['id_categoria']?>"><?php echo $categoria['nombre-categoria']; ?></option>
                    <?php } ?>

                   </select>
                 </div>
             </section>
         </div>
         <div class="col-lg-6">
           <section class="card">
               <div class="card-body text-secondary">
                 <label for="text-input" class=" form-control-label">Precio unitario:</label>
                 <input type="text" id="precio" name="precio" placeholder="Ingrese el monto unitario" class="form-control">
               </div>
           </section>
         </div>
         <div class="col-lg-6">
           <section class="card">
               <div class="card-body text-secondary">
                 <label for="text-input" class=" form-control-label">Stock Inicial:</label>
                 <input type="text" id="stock" name="stock" placeholder="Ingrese el stock inicial" class="form-control">
               </div>
           </section>
         </div>
         <div class="col-lg-12">
           <button type="button" class="btn btn-success btn-lg btn-block" onClick="h ()"> <i class="ti-save"></i>&nbsp;Crear Nuevo Producto</button>

         </div>

   </div>
  </div>





  <script type="text/javascript">

    function h (){
      var Producto = $("#producto").val();
      var Categoria = $("#categoria").val();
      var Precio = $("#precio").val();
      var Stock = $("#stock").val();
      $.post('funciones/ingresoProducto.php',{producto:Producto,categoria:Categoria,precio:Precio,stock:Stock},
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
     });


    }
  </script>
