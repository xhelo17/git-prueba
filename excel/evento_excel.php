<?php
$nombre = "Nombre_fichero";
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$nombre.xls");
header("Pragma: no-cache");
header("Expires: 0");
set_time_limit(840);
ini_set('memory_limit','200M');

if(($_POST['txt_fechadesde'])and($_POST['txt_fechahasta'])){
			   // Dirección o IP del servidor MySQL TW8605
				$host = "168.88.13.62";
				$puerto = "3306";
				$usuario = "fcop";
				$contrasena = "fcop2019";
				$baseDeDatos ="DB_Fcop";
				$tabla = "evento";
				
				function Conectarse(){
				
				 global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
			 
				 if (!($link = mysqli_connect($host, $usuario, $contrasena))){
				  
					echo "Error conectando a la base de datos.<br>"; 
					exit(); 
					
				 }else{
					
					echo "";
				
				 }
				
				 if (!mysqli_select_db($link, $baseDeDatos)){ 
				 
					echo "Error seleccionando la base de datos.<br>"; 
					exit(); 
				 }else{
				 
				   echo "";
				 
				 }
			   
			   return $link; 
 } 
			
			
			   
			
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title> </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="calendar/calendar-blue2.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
.Estilo1 {font-size: 9px}
-->
</style></head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body >
<form name="form1" method="post" action="est_inscano_excel.php" >
     <input type="hidden" name="accion" value="<? echo $_POST['accion']; ?>">
		<table border="0" cellpadding="0" cellspacing="2" width="100%" class="TablaGeneral">                        
		<tr class="custom-title" align="center">
		<td width="7%" >ID</td>
		<td width="7%" >MOTIVO</td>
		<td width="7%" >TIPO</td>
		<td width="7%" >P. INTERVINO</td>
		<td width="7%" >PROVINCIA</td>
		<td width="7%" >REGION</td>
		<td width="7%" >ZONA</td>
		<td width="7%" >COMISARIA</td>
		<td width="7%" >CANTIDAD ASISTENTES</td>
		<td width="7%" >AUTORIZADO</td>
		<td width="7%" >FECHA INICIO</td>						
		<td width="7%" >HORA INICIO</td>
		<td width="7%" >FECHA TERMINO</td>
		<td width="8%" >HORA TERMINO</td>
		</tr>
		
		<tr class="CeldaDetalle" align="left">
		<td colspan="14" align="center"></td>  
		</tr>
		<?php 
		   
			   $link = Conectarse();
			   $query = "SELECT
						evento.id_evento,
						evento.motivo,
						evento.tipo_evento,
						evento.fecha_inicio,
						evento.fecha_termino,
						evento.hora_inicio,
						evento.hora_termino,
						evento.autorizado,
						evento.cantidad_asistentes,
						evento.personal_intervino,
						evento.zona,
						evento.provincia,
						evento.comisaria,
						evento.cod_fun_ingreso,
						evento.fecha_ingreso,
						evento.descripcion_evento,
						tb_motivo.glosa_motivo,
						tb_tipoevento.glosa_tipoevento,
						tb_personalintervino.glosa_intervino,
						tb_provincia.glosa_provincia,
						REGION.DESCRIPCION_REGION,
						ZONA_DESC.DESCRIPCION AS ZONAD,
						COMI_DESC.DESCRIPCION AS COMID
						FROM
						evento
						Inner Join tb_motivo ON evento.motivo = tb_motivo.id_motivo
						Inner Join tb_tipoevento ON evento.tipo_evento = tb_tipoevento.id_tipoevento
						Inner Join tb_personalintervino ON evento.personal_intervino = tb_personalintervino.id_intervino
						Inner Join tb_provincia ON evento.provincia = tb_provincia.id_provincia
						Inner Join REGION ON tb_provincia.id_region = REGION.ID_REGION
						Inner Join REPARTICION AS ZONA_DESC ON evento.zona = ZONA_DESC.CORRELATIVO
						Inner Join REPARTICION AS COMI_DESC ON evento.comisaria = COMI_DESC.CORRELATIVO
						WHERE
						evento.fecha_inicio BETWEEN  '".$_POST['txt_fechadesde']."' AND '".$_POST['txt_fechahasta']."'";
			 // echo $query;
			   $result = mysqli_query($link, $query); 
			 
		   while($row = mysqli_fetch_array($result)){
		   
echo "<tr align='center'>";
echo "<td width='7%' >".$row["id_evento"]."</td>";
echo "<td width='7%' >".$row["glosa_motivo"]."</td>";
echo "<td width='7%' >".$row["glosa_tipoevento"]."</td>";
echo "<td width='7%' >".$row["glosa_intervino"]."</td>";
echo "<td width='7%' >".$row["glosa_provincia"]."</td>";
echo "<td width='7%' >".$row["DESCRIPCION_REGION"]."</td>";
echo "<td width='7%' >".$row["ZONAD"]."</td>";
echo "<td width='7%' >".$row["COMID"]."</td>";
echo "<td width='7%' >".$row["cantidad_asistentes"]."</td>";
echo "<td width='7%' >".$row["autorizado"]."</td>";
echo "<td width='7%' >".$row["fecha_inicio"]."</td>";
echo "<td width='7%' >".$row["hora_inicio"]."</td>";
echo "<td width='7%' >".$row["fecha_termino"]."</td>";
echo "<td width='8%' >".$row["hora_termino"]."</td>";
echo "</tr>";
			
			
				} 
			mysqli_free_result($result); 
			mysqli_close($link); 
		
		}
		?>						          
		</table>
</form>

</body>
</html>
