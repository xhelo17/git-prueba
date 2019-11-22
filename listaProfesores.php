<?php
include "conexion.php";
$conexion = conectar();

$sql="SELECT
profesores.rut,
profesores.profe_nombre,
profesores.descripcion
FROM
profesores";
$resultado = mysqli_query($conexion,$sql);
 ?>

 <div class="content mt-3">
               <div class="animated fadeIn">
                   <div class="row">

                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-header">
                               <strong class="card-title">Data Table</strong>
                           </div>
                           <div class="card-body">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered">
                       <thead>
                         <tr>
                           <th>RUT</th>
                           <th>CODIGO</th>
                           <th>GRADO</th>
                        </tr>
                       </thead>
                       <tbody>
                           <?php foreach ($resultado as $cliente){ ?>
                         <tr>
                           <td> <?php echo $cliente["rut"]; ?></td>
                           <td><?php echo $cliente['profe_nombre']?></td>
                           <td><?php echo $cliente['descripcion']?></td>

                         </tr>
                         <?php } ?>
                       </tbody>
                     </table>
                           </div>
                       </div>
                   </div>


                   </div>
               </div><!-- .animated -->

           </div><!-- .content -->



           <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Detalles</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th scope="col">ASIGNATURA</th>
                                              <th scope="col">PROFESOR</th>
                                              <th scope="col">DURACION</th>

                                            </tr>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($resultado as $cliente){ ?>
                                            <tr>
                                              <td><?php echo $cliente["nombre_asig"]; ?></td>
                                              <td><?php echo $cliente['nombre']?></td>
                                              <td><?php echo $cliente['duracion']?></td>
                                            </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              <button type="button" class="btn btn-primary" onClick="alert('hola rifo');">Confirm</button>
                          </div>
                      </div>
                  </div>
              </div>



              <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
              <script src="assets/js/popper.min.js"></script>
              <script src="assets/js/plugins.js"></script>
              <script src="assets/js/main.js"></script>


              <script src="assets/js/lib/data-table/datatables.min.js"></script>
              <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
              <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
              <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
              <script src="assets/js/lib/data-table/jszip.min.js"></script>
              <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
              <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
              <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
              <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
              <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
              <script src="assets/js/lib/data-table/datatables-init.js"></script>
              <script type="text/javascript">
                  $(document).ready(function() {
                    $('#bootstrap-data-table-export').DataTable();
                  } );
              </script>
