<style type="text/css">
#tabla_datos{
  overflow-Y: auto;
}
  </style>

<?php
include "conector.php";
$dato = $_POST["dato"];

$por_pagina =11;
if (isset($_GET['pagina']))
{
  $pagina = $_GET['pagina'];
}
else
{
  $pagina = 1;
}
$empieza = ($pagina-1)* $por_pagina;

$sql_buscar = " SELECT
                evento.id_evento,
                evento.tipo_evento,
                evento.zona,
                evento.fecha_inicio,
                evento.descripcion_evento,
                evento.comisaria
                FROM
                evento
                WHERE
                evento.id_evento LIKE '%$dato%'OR
                evento.descripcion_evento LIKE '%$dato%'OR
                evento.zona LIKE '%$dato%' OR
                evento.tipo_evento LIKE '%$dato%'OR
                evento.fecha_ingreso LIKE '%$dato%'
                ORDER BY id_evento DESC
                LIMIT $empieza,$por_pagina
                ";


$resultado = ejecutaSQL_select('conecta',$sql_buscar);
$resultado1 = ejecutaSQL_select('conecta',$sql_buscar);
 ?>
 <table  id="tabla_datos" class="table table-striped table-bordered small text-justify list-inline">
   <thead>
     <tr>
       <th>ID</th>
       <th>DESCRIPCION</th>
       <th >TIPO</th>
       <th >ZONA</th>
       <th>COMIZARIA</th>
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
         <td><?php echo $res->comisaria;?></td>
         <td><?php echo $res->fecha_inicio; ?></td>
         <td><button onclick="accion('<?php echo $res->id_evento; ?>')" class="btn btn-outline-info"><i class="fa fa-magic"></i>MODIFICAR</button></td>
         <td><button onclick="agregar('<?php echo $res->id_evento; ?>')" type="button" class="btn btn-outline-danger">RECLAMO</button></td>
     </tr>
     <?php } ?>
   </tbody>
 </table>

 <div id="indice">
   <?php $sql = "SELECT * FROM evento";
   $resultado = ejecutaSQL_select("conecta",$sql);

   $total_registros = mysqli_num_rows($resultado);
   $total_paginas = ceil($total_registros / $por_pagina);
   ?>
 <ul class="pagination">

    <li class="page-item"><a href='PRUEBAS.php?pagina=1'>Primera&nbsp;</a></li>
     <?php
   for ($i=1; $i<=$total_paginas; $i++)
   {
      echo "<li class='page-item'>"."<a href='PRUEBAS.php?pagina=".$i."'>"."&nbsp;".$i."&nbsp;"."</a>"."</li>";

   }

   ?>

   <li class="page-item"><a href='PRUEBAS.php?pagina="<?echo $total_paginas;?>"'>&nbsp;Última</a></li>

   </ul>
 </div>
