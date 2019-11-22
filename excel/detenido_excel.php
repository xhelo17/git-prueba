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
<form name="form1" method="post" action="detenido_excel.php" >
     <input type="hidden" name="accion" value="<? echo $_POST['accion']; ?>">
		<table border="0" cellpadding="0" cellspacing="2" width="100%" class="TablaGeneral">                        
		<tr class="custom-title" align="center">
		<td width="7%" >ID</td>
		<td width="7%" >EDAD</td>
		<td width="7%" >SEXO</td>
		<td width="7%" >PARTE</td>
		<td width="7%" >MOTIVO</td>
		<td width="7%" >LESION</td>
		<td width="7%" >ZONA</td>
		<td width="7%" >COMISARIA</td>
		<td width="7%" >PROVINCIA</td>
		<td width="7%" >REGION</td>
		</tr>
		
		<tr class="CeldaDetalle" align="left">
		<td colspan="14" align="center"></td>  
		</tr>
		<?php 
		   
			   $link = Conectarse();
			   $query = "SELECT
						detenido.id_detenido,
						detenido.id_evento,
						detenido.edad_detenido,
						detenido.genero_detenido,
						detenido.motivo_detenido,
						detenido.lesiones_detenido,
						detenido.parte_detenido,
						tb_motivo_detencion.glosa_motivodetencion,
						tb_lesion.glosa_lesion,
						evento.id_evento,
						zonad.DESCRIPCION AS ZONAD,
						REPARTICION.DESCRIPCION AS COMID,
						tb_provincia.glosa_provincia,
						REGION.DESCRIPCION_REGION,
						evento.fecha_inicio
FROM
detenido
Inner Join tb_motivo_detencion ON detenido.motivo_detenido = tb_motivo_detencion.id_motivodetencion
Inner Join tb_lesion ON detenido.lesiones_detenido = tb_lesion.id_lesion
Inner Join evento ON detenido.id_evento = evento.id_evento
Inner Join REPARTICION AS zonad ON evento.zona = zonad.CORRELATIVO
Inner Join REPARTICION ON evento.comisaria = REPARTICION.CORRELATIVO
Inner Join tb_provincia ON evento.provincia = tb_provincia.id_provincia
Inner Join REGION ON tb_provincia.id_region = REGION.ID_REGION

						WHERE
						evento.fecha_inicio BETWEEN  '".$_POST['txt_fechadesde']."' AND '".$_POST['txt_fechahasta']."'";
			 // echo $query;
			   $result = mysqli_query($link, $query); 
			 
		   while($row = mysqli_fetch_array($result)){
		   
echo "<tr align='center'>";
echo "<td width='7%' >".$row["id_evento"]."</td>";
echo "<td width='7%' >".$row["edad_detenido"]."</td>";
echo "<td width='7%' >".$row["genero_detenido"]."</td>";
echo "<td width='7%' >".$row["parte_detenido"]."</td>";
echo "<td width='7%' >".$row["glosa_motivodetencion"]."</td>";
echo "<td width='7%' >".$row["glosa_lesion"]."</td>";
echo "<td width='7%' >".$row["ZONAD"]."</td>";
echo "<td width='7%' >".$row["COMID"]."</td>";
echo "<td width='7%' >".$row["glosa_provincia"]."</td>";
echo "<td width='7%' >".$row["DESCRIPCION_REGION"]."</td>";
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
