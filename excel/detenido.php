<?php
	switch($_POST['accion']){
	
		case "excel":
			require_once ("detenido_excel.php");
			
		exit;
		break;
	}		
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Listado</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="calendar/calendar-blue2.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/validarut.js"></script> 
<script type="text/javascript" src="calendar/calendar.js"></script> 
<script type="text/javascript" src="calendar/lang/calendar-es.js"></script> 
<script type="text/javascript" src="calendar/calendar-setup.js"></script> 
<script type="text/javascript" src="js/funciones.js"></script>

<script type="text/javascript" src="calendar/calendar-setup.js"></script> 

<script type="text/javascript">



function excel(){


			document.form1.accion.value='excel';
			document.form1.submit();			
	 	// location.href = "menu_estadistico.php";
		location.href = "procesopreseleccion.php?postu_id="+postu_id;

				
}



function volver(){
			//document.form1.accion.value ='nuevapostulacion';
			//document.form1.submit();
			location.href = "menu_estadistico.php";
			
}

function preseleccion(postu_id){
//alert('preseleccion');
//alert(postu_id);
location.href = "procesopreseleccion.php?postu_id="+postu_id;
}


</script>
<style type="text/css">
<!--
body {
	background-image: url("img/bkgnd.jpg");
}
.Estilo1 {font-size: 9px}
-->
</style></head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/logo carabinero.ico" />
</head>
<body>
<form name="form1" method="post" action="detenido.php" >
     <input type="hidden" name="accion" value="<? echo $_POST['accion']; ?>">
  <table width="100%"  border="0" >
    <tr>
      <td align="center"><p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center">
	  <table width="95%"  border="0" bgcolor="#FFFFFF">
        <tr>
          <td width="30%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
          <td width="30%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center">&nbsp;</td>
          </tr>
      
        <tr>
          <td colspan="3" height="5" bgcolor="#698668"></td>
          </tr>
        <tr>
          <td colspan="3" align="center"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="4" align="center" >DETENIDOS</td> 
              </tr>
			   <tr>
              <td colspan="4" height="5" bgcolor="#698668" ></td>
              </tr>
            <tr>
              <td width="22%" class="instr_sim" align="right">&nbsp;</td>
              <td width="30%" class="TextoNegroBold12">&nbsp;</td>
              <td width="31%" class="TextoNegroBold12">&nbsp;</td>
              <td align="right" class="instr_sim">&nbsp;</td>
              </tr>
            <tr>
              <td height="34" class="instr_sim" align="right">&nbsp;</td>
              <td valign="middle" class="TextoNegroBold12">&nbsp;</td>
              <td valign="middle" class="TextoNegroBold12">&nbsp;</td>
              <td align="right" class="instr_sim">&nbsp;              </td>
              </tr>
            <tr>
              <td height="34" align="right" class="instr_sim">&nbsp;</td>
              <td valign="middle" class="TextoNegroBold12" align="right"><span class="instr_sim">FECHA INICIO  : &nbsp;</span></td>
              <td valign="middle" class="TextoNegroBold12">  <input name="txt_fechadesde" id="txt_fechadesde" type="text" size="20" maxlength="10" class="texto" style="text-transform:uppercase" value="<?php echo $_POST['txt_fechadesde'];?>" >
			    <a title="Fecha Inicio citacion" href="#"><img id="btn_fechadesde"src="calendar/calendar.gif" border="0" width='25' height='20' ></a></td>
              <td align="right" class="instr_sim">&nbsp;</td>
            </tr>
            <tr>
              <td height="34" align="right" class="instr_sim">&nbsp;</td>
              <td valign="middle" class="TextoNegroBold12" align="right"><span class="instr_sim">FECHA TERMINO : </span></td>
              <td valign="middle" class="TextoNegroBold12">
			  <div id="escalafon">
			      <input name="txt_fechahasta" id="txt_fechahasta" type="text" size="20" maxlength="10" class="texto" style="text-transform:uppercase" value="<?php echo $_POST['txt_fechahasta'];?>" >
			   <a title="Fecha hasta citacion" href="#"><img id="btn_fechahasta"src="calendar/calendar.gif" border="0" width='25' height='20' ></a>
</div>
			  </td>
              <td align="right" class="instr_sim">&nbsp;</td>
            </tr>
            <tr>
              <td height="34" align="right" class="instr_sim">&nbsp;</td>
              <td valign="middle" class="TextoNegroBold12"><div align="right"></div></td>
              <td valign="middle" class="TextoNegroBold12">&nbsp;</td>
              <td align="right" class="instr_sim">&nbsp;              </td>
              </tr>
            <tr>
              <td height="34" colspan="4" align="center" class="txt_usuario ts-thinkbox-name ts-thinkbox-name">
				<input type="button" name="buttonBuscar" id="buttonBuscar"  class="Boton"  onClick="excel()" style="width:200px"   value="GENERAR EXCEL" /></td>
              </tr>
            </table></td>
          </tr>
        <tr>
          <td colspan="3" align="center">&nbsp;		  	</td>
          </tr>
        <tr>
          <td colspan="3" height="5" bgcolor="#698668"></td>
          </tr>
	    <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="ts-thinkbox-name Estilo1">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>	  </td>
    </tr>
  </table>

</form>
<script type="text/javascript">

// configuracion calendario
 Calendar.setup({ 
    	inputField     	:    "txt_fechadesde",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechadesde"     // el id del botón que lanzará el calendario
   }); 
    
   Calendar.setup({ 
    	inputField     	:    "txt_fechahasta",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechahasta"     // el id del botón que lanzará el calendario
   });
 /*   
   
      Calendar.setup({ 
    	inputField     	:    "txt_fechaexamenmedicopreliminar",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechaexamenmedicopreliminar"     // el id del botón que lanzará el calendario
   });
   
  
    Calendar.setup({ 
    	inputField     	:    "txt_fechaexamendental",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechaexamendental"     // el id del botón que lanzará el calendario
   });
   
   
     Calendar.setup({ 
    	inputField     	:    "txt_fechaexamenfycgral",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechaexamenfycgral"     // el id del botón que lanzará el calendario
   });
   
   
     Calendar.setup({ 
    	inputField     	:    "txt_fechaentrevpersonal",     // id del campo de texto 
    	ifFormat     	:    "%Y-%m-%d",     // formato de la fecha que se escriba en el campo de texto
    	button     		:    "btn_fechaentrevpersonal"     // el id del botón que lanzará el calendario
   });
   
  */ 
  	
</script> 
</body>
</html>
