<?php
include "conector.php";
$unidad_autentificatic='3809';

if($unidad_autentificatic){

$sql ="SELECT					
			REPARTICION.ID_TIPO
		FROM
			REPARTICION
		WHERE 
			REPARTICION.CORRELATIVO='".$unidad_autentificatic."' ";
//echo $sql;
$resultado_tipo = ejecutaSQL_select("conecta",$sql);
	while($res = mysqli_fetch_object($resultado_tipo)){
	$tipo_unidad=$res->ID_TIPO; 	
	}
}


$por_pagina =10;
if (isset($_GET['pagina']))
{
  $pagina = $_GET['pagina'];
}
else
{
  $pagina = 1;
}

$empieza = ($pagina - 1) * $por_pagina;

$sql_lista_evento ="SELECT
					evento.id_evento,
					evento.tipo_evento,
					evento.zona,
					evento.fecha_inicio,
					evento.descripcion_evento,
					tb_tipoevento.glosa_tipoevento,
					REPARTICION.DESCRIPCION as descripcion_zona
					FROM
					evento
					Inner Join tb_tipoevento ON evento.tipo_evento = tb_tipoevento.id_tipoevento
					Inner Join REPARTICION ON evento.zona = REPARTICION.CORRELATIVO
					WHERE 
					evento.id_evento >0 ";

if(($unidad_autentificatic !='3509') AND ($unidad_autentificatic !='4033')) {

	if($tipo_unidad =='63'){
	$sql_lista_evento .=" AND evento.zona='".$unidad_autentificatic."' ";
	}else{
	$sql_lista_evento .=" AND evento.comisaria='".$unidad_autentificatic."' ";
	}

}

					
					
$sql_lista_evento .="ORDER BY id_evento DESC
                    LIMIT $empieza,$por_pagina";

//echo $sql_lista_evento;
$resultado = ejecutaSQL_select("conecta",$sql_lista_evento);

$res = mysqli_fetch_object($resultado);




 ?>
<table   class="table table-striped table-bordered small text-justify list-inline">
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
