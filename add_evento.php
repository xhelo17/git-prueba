<?php
require("base_i.php");
$mysqli=new basedatos();
session_start();
	//include_once('functions.php');

	
	
	
if (empty($_COOKIE['token'])){
		
	header('Location: index.php');
	
   die();
		
		
		
	}

if( ! ini_get('date.timezone') ) { date_default_timezone_set('America/Santiago'); } 
$v1=$_COOKIE['v1'];
 ?>




<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carabineros de Chile</title>
  <!-- plugins:css -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
   <!-- plugins:js 
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--
  

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
  <script type="text/javascript" src="js_666/bootstrap.min.js"></script>
  <!--<script src="js_666/inputmask.js"></script>-->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="favicon.ico" />
  
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!--
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  -->

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
    <script src="assets/js/axios.min.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  
  <script src="bootstrap-select/js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="bootstrap-select/css/bootstrap-select.min.css">
  
  <link rel="stylesheet" type="text/css" href="font_awesome/css/font-awesome.css" media="screen" />
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

   
   <style>
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('cargando.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>


   
   
   <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>

   
   
   
   
   
     <script type="text/javascript">
function validar_token(){

			var urlValidateToken ='http://autentificaticapi.carabineros.cl/api/auth/validate-token';
			axios.get(urlValidateToken, {
				headers: {
				/* Tipo de Token ('Bearer') y Token de acceso */
				'Authorization': 'Bearer '+'<?php echo $_COOKIE['token'];?>',
				'Accept': 'application/json',
				'Content-Type': 'application/x-www-form-urlencoded'
				}
			}).then(response => {
		 /* Respuesta satisfactoria */
				console.log(response.data);
				var mostrar = JSON.stringify(response.status); 

		
			
			
			
			if(mostrar!=200){
					location.href = "index.php";
			
				
			}
			
			
			
		 }).catch(error => {
		 /* error al validar token (ej. token no autorizado (401)) */
			console.log(error.response.data);
		     location.href = "index.php";
		   
		
		
		 });
		 
			
		 
		 }





</script>



<script type="text/javascript">

setTimeout("cerrar_sesion()", 3600000);

</script>
   
 <script type="text/javascript">
   
   
   function cerrar_sesion(){
		var urlLogout = 'http://autentificaticapi.carabineros.cl/api/auth/logout'; 
		axios.get(urlLogout, {
			headers: { /* Tipo de Token ('Bearer') y Token de acceso */ 
			'Authorization': 'Bearer '+'<?php echo $_COOKIE['token'];?>',
			'Accept': 'application/json', 
			'Content-Type': 'application/x-www-form-urlencoded' } 
		}).then(response => {
			/* Respuesta satisfactoria */ 
			console.log(response.data); 
			 location.href = "index.php";
			 document.cookie = "token=;";
			  document.cookie = "token= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			   document.cookie = "v1=;";
			  document.cookie = "v1= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			 alert("Se ha cerrado la sesión o esta ha caducado");
		}).catch(error => { /* error al cerrar sesión (ej. token no autorizado (401)) */ 
		console.log(error.response.data); 
		if(error.response.data){
			location.href = "index.php";
			document.cookie = "token=;";
			document.cookie = "token= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			 document.cookie = "v1=;";
			  document.cookie = "v1= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
			 alert("Se ha cerrado la sesión o esta ha caducado");
		}
		}); 
		
		}
		


</script>
   
   
 <script>
  document.addEventListener("DOMContentLoaded", function(event) {
    validar_token();
  });
</script>
   
   
   
   
   
   
</head>

<body>

<?php


?>


<div class="loader"></div>
		<!-- here goes content ###################################################-->
		
		<form action="add_evento.php" method="post">
		
		
		
		
        <div class="nada" style="width:100%;background-color:#fff;height:65px">
          <div class="container-fluid clearfix" style="text-align:center">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="line-height:80px;color:white;font-size:30px">
				FORMULARIO AUTOMATIZADO EN PROCEDIMIENTOS COP </span> <a href="#" onclick="cerrar_sesion();">Cerrar sesión</a>
          </div>
        </div>		
		
        <div class="nada" style="width:100%;background-color:#175F27;height:60px">
          <div class="container-fluid clearfix" style="text-align:center;line-height:80px">
            <!--<span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="color:white;font-size:20px">
              FORMULARIO AUTOMATIZADO EN PROCEDIMIENTOS COP</span>-->
			<a href="main.php" class="text-muted d-block text-center text-sm-left d-sm-inline-block">Listado de eventos</a>
          </div>
        </div>
		
		
<div class="row">
<div class="col-2 grid-margin"></div>
<div class="col-8 grid-margin">
  <div class="card">
	<div class="card-body">
		<h2 class="card-title">INGRESO</h2>
		<style>
		#exTab3 .nav-pills > li > a {
		  border-radius: 4px 4px 0 0 ;
		}

		#exTab3 .tab-content {
		  color : white;
		  background-color: #175F27;
		  padding : 1px;
		  width:100%;
		}

		.tab_margin{
			color : black;
			width:100%;
			padding : 5px 15px;
			background-color:white;
		}
		</style>
		<script>
		function active_tab_update (el){
			var elems = document.querySelectorAll(".tabtitle.active");

			[].forEach.call(elems, function(el) {
				el.classList.remove("active");
			});
			
			el.parentNode.classList.add("active");
		}
		</script>
		<!-- tabbed panel ini -->
		<div id="exTab3">	
			<ul  class="nav nav-pills">
			<li class="tabtitle active"> <a href="#1b" data-toggle="tab" onclick="active_tab_update(this)"><img src="evento.png" width="50" height="50" >&nbsp; EVENTO</a></li>
			<li class="tabtitle"><a href="#2b" data-toggle="tab" onclick="active_tab_update(this)"><img src="detenidos.png" width="50" height="50" >&nbsp; DETENIDOS</a></li >
			<li class="tabtitle"><a href="#3b" data-toggle="tab" onclick="active_tab_update(this)"><img src="lesionado.png" width="50" height="50" >&nbsp; PERSONAS LESIONADAS</a></li>
			<li class="tabtitle"><a href="#4b" data-toggle="tab" onclick="active_tab_update(this)"><img src="carabinero.png" width="50" height="50" >&nbsp; CARABINEROS LESIONADOS</a></li>
			<li class="tabtitle"><a href="#5b" data-toggle="tab" onclick="active_tab_update(this)"><img src="danos.png" width="50" height="50" >&nbsp; DAÑOS</a></li>
	
			<!--<li class="tabtitle"><a href="#7b" data-toggle="tab" onclick="active_tab_update(this)">DESCARGAS</a></li>-->
			</ul>

			<div class="tab-content clearfix">
				<div class="tab-pane active" id="1b">
					<div class="tab_margin">
<!-- tab1 ini -->
	  <form action="" method="post" name="ingreso" class="form-sample" enctype="multipart/form-data">
	  <br>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">

  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Motivo</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_motivo" name="cbo_motivo">
		  <option value="Político">Político</option>
		  <option value="Social (Agrupaciones habitacionales)">Social (Agrupaciones habitacionales)</option>
		  <option value="Social (Agrupaciones comunitarias)">Social (Agrupaciones comunitarias)</option>
		  <option value="Social (Otras agrupaciones)">Social (Otras agrupaciones)</option>
		  <option value="Social (Fecha contingencia)">Social (Fecha contingencia)</option>
		  <option value="Animalista">Animalista</option>
		  <option value="Estudiantil (Educación secundaria)">Estudiantil (Educación secundaria)</option>
		  <option value="Estudiantil (Educación superior)">Estudiantil (Educación superior)</option>
		  <option value="Laboral (Pesquero)">Laboral (Pesquero)</option>
		  <option value="Laboral (Colegio profesores)">Laboral (Colegio profesores)</option>
		  <option value="Laboral (Salud)">Laboral (Salud)</option>
		  <option value="Laboral (Camioneros)">Laboral (Camioneros)</option>
		  <option value="Laboral (Empleados públicos)">Laboral (Empleados públicos)</option>
		  <option value="Laboral (Mineros)">Laboral (Mineros)</option>
		  <option value="Laboral (Choferes locomoción colectiva)">Laboral (Choferes locomoción colectiva)</option>
		  <option value="Laboral (Sindicato o empresa)">Laboral (Sindicato o empresa)</option>
		  <option value="Étnico">Étnico</option>
		  <option value="Género (Feminista)">Género (Feminista)</option>
		  <option value="Género (Otras agrupaciones)">Género (Otras agrupaciones)</option>
		  <option value="Procedimiento policial">Procedimiento policial</option>
		  <option value="Ambientalista">Ambientalista</option>
		  <option value="Religioso">Religioso</option>
		  <option value="Deportivo (Fútbol primera división)">Deportivo (Fútbol primera división)</option>
		  <option value="Deportivo (Fútbol segunda división)">Deportivo (Fútbol segunda división)</option>
		  <option value="Deportivo (Otros eventos deportivos)">Deportivo (Otros eventos deportivos)</option>
		  <option value="Artístico">Artístico</option>
		
		</select>
	  </div>
	</div>
  </div>


  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Tipo de evento</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_tipo_evento" name="cbo_tipo_evento" required>
		  <option value="Concentración">Concentración</option>
		  <option value="Marcha lícita con autorización">Marcha lícita con autorización</option>
		  <option value="Marcha lícita sin autorización">Marcha lícita sin autorización</option>
		  <option value="Marcha ilícita agresiva">Marcha ilícita agresiva</option>
		  <option value="Desórdenes graves en liceos o colegios">Desórdenes graves en liceos o colegios</option>
		  <option value="Desórdenes graves en casas de educación superior">Desórdenes graves en casas de educación superior</option>
		  <option value="Fechas emblemáticas">Fechas emblemáticas</option>
		  <option value="Violencia rural">Violencia rural</option>
		  <option value="Eventos futbol profesional">Eventos futbol profesional</option>
		  <option value="Eventos masivos">Eventos masivos</option>
		  <option value="Bloqueo de calzada">Bloqueo de calzada</option>
		  <option value="Desalojo">Desalojo</option>
		  <option value="Cortejo funebre">Cortejo funebre</option>
		  <option value="Velorio">Velorio</option>
		  <option value="Allanamiento">Allanamiento</option>
		</select>
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Fecha de inicio</label>
	  <div class="col-sm-8">
		<input type="textarea" class="form-control" placeholder="Fecha..." id="txt_fecha_inicio" name="txt_fecha_inicio" value=""   readonly />
	  </div>
	</div>
  </div>

   <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Hora de inicio</label>
	  <div class="col-sm-8">
		<input type="time" class="form-control" placeholder="Hora..." id="txt_hora_inicio" name="txt_hora_inicio" value="" oninvalid="this.setCustomValidity('El campo está incompleto o posee un valor no válido.')"  />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Fecha de término</label>
	  <div class="col-sm-8">
		<input type="textarea" class="form-control" placeholder="Fecha..." id="txt_fecha_termino" name="txt_fecha_termino" value="" readonly  />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Hora de término</label>
	  <div class="col-sm-8">
		<input type="time" class="form-control" placeholder="Hora..." id="txt_hora_termino" name="txt_hora_termino" value=""  oninvalid="this.setCustomValidity('El campo está incompleto o posee un valor no válido.')" />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Autorizado</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_autorizado" name="cbo_autorizado" required >
		  <option value="Si">Si</option>
		  <option value="No">No</option>
		</select>
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Cantidad de asistentes</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Cantidad..." id="txt_asistentes" name="txt_asistentes" value="" step="1" min="0" required />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Personal que intervino</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_personal" name="cbo_personal" required >
		  <option value="Territorial">Territorial</option>
		  <option value="Especializado">Especializado</option>
		  <option value="Mixto">Mixto</option>
		</select>
	  </div>
	</div>
  </div>

  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Zona</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_zona" name="cbo_zona" required >
		  <option value="I zona de Tarapacá">I zona de Tarapacá</option>
		  <option value="II zona de Antofagasta">II zona de Antofagasta</option>
		  <option value="III zona de Atacama">III zona de Atacama</option>
		  <option value="IV zona de Coquimbo">IV zona de Coquimbo</option>
		  <option value="V zona de Valparaíso">V zona de Valparaíso</option>
		  <option value="VI zona de Ohiggins">VI zona de Ohiggins</option>
		  <option value="Zona Metropolitana">Zona Metropolitana</option>
		  <option value="VII zona del Maule">VII zona del Maule</option>
		  <option value="VIII zona de Bio Bio">VIII zona de Bio Bio</option>
		  <option value="IX zona de la Araucanía">IX zona de la Araucanía</option>
		  <option value="X zona de los Lagos">X zona de los Lagos</option>
		  <option value="XI zona de Aysén">XI zona de Aysén</option>
		  <option value="XII zona de Magallanes">XII zona de Magallanes</option>
		  <option value="XIV zona de los ríos">XIV zona de los ríos</option>
		  <option value="XV zona de Arica y Parinacota">XV zona de Arica y Parinacota</option>
		  <option value="XVI zona del Ñuble">XVI zona del Ñuble</option>
		  <option value="Zona Metropolitana Este">Zona Metropolitana Este</option>
		  <option value="Zona Metropolitana Oeste">Zona Metropolitana Oeste</option>
		  <option value="Zona Transito carreteras y Seguridad vial">Zona Transito carreteras y Seguridad vial</option>
		  <option value="Dirección de Educación">Dirección de Educación</option>
		  
		  	  
		</select>
	  </div>
	</div>
  </div>
  
  
    <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Comisaría</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_comisaria" name="cbo_comisaria" required >

		    <option value="NINGUNA">NINGUNA</option>
			<option value="10A. COM. LA CISTERNA">10A. COM. LA CISTERNA</option>
			<option value="11A. COM. LO ESPEJO">11A. COM. LO ESPEJO</option>
			<option value="12A. COM. SAN MIGUEL">12A. COM. SAN MIGUEL</option>
			<option value="13A. COM. LA GRANJA">13A. COM. LA GRANJA</option>
			<option value="14A. COM. SAN BERNARDO">14A. COM. SAN BERNARDO</option>
			<option value="15A. COM. BUIN">15A. COM. BUIN</option>
			<option value="16A. COM. LA REINA">16A. COM. LA REINA</option>
			<option value="17A. COM. LAS CONDES">17A. COM. LAS CONDES</option>
			<option value="18A. COM. NUNOA">18A. COM. NUNOA</option>
			<option value="19A. COM. PROVIDENCIA">19A. COM. PROVIDENCIA</option>
			<option value="1RA. COM. ANCUD">1RA. COM. ANCUD</option>
			<option value="1RA. COM. ANGOL">1RA. COM. ANGOL</option>
			<option value="1RA. COM. ARAUCO">1RA. COM. ARAUCO</option>
			<option value="1RA. COM. ARICA">1RA. COM. ARICA</option>
			<option value="1RA. COM. CALAMA">1RA. COM. CALAMA</option>
			<option value="1RA. COM. CHANARAL">1RA. COM. CHANARAL</option>
			<option value="1RA. COM. CONCEPCION">1RA. COM. CONCEPCION</option>
			<option value="1RA. COM. COYHAIQUE">1RA. COM. COYHAIQUE</option>
			<option value="1RA. COM. CURICO">1RA. COM. CURICO</option>
			<option value="1RA. COM. IQUIQUE U">1RA. COM. IQUIQUE U</option>
			<option value="1RA. COM. LA LIGUA">1RA. COM. LA LIGUA</option>
			<option value="1RA. COM. LA SERENA">1RA. COM. LA SERENA</option>
			<option value="1RA. COM. LAUTARO">1RA. COM. LAUTARO</option>
			<option value="1RA. COM. LINARES">1RA. COM. LINARES</option>
			<option value="1RA. COM. LOS ANGELES">1RA. COM. LOS ANGELES</option>
			<option value="1RA. COM. OSORNO U">1RA. COM. OSORNO U</option>
			<option value="1RA. COM. PUERTO VARAS">1RA. COM. PUERTO VARAS</option>
			<option value="1RA. COM. RANCAGUA">1RA. COM. RANCAGUA</option>
			<option value="1RA. COM. SAN ANTONIO">1RA. COM. SAN ANTONIO</option>
			<option value="1RA. COM. SAN CARLOS">1RA. COM. SAN CARLOS</option>
			<option value="1RA. COM. SAN CLEMENTE">1RA. COM. SAN CLEMENTE</option>
			<option value="1RA. COM. SAN FERNANDO">1RA. COM. SAN FERNANDO</option>
			<option value="1RA. COM. SANTIAGO">1RA. COM. SANTIAGO</option>
			<option value="1RA. COM. SUR VALPARAISO">1RA. COM. SUR VALPARAISO</option>
			<option value="1RA. COM. TALTAL">1RA. COM. TALTAL</option>
			<option value="1RA. COM. TOME">1RA. COM. TOME</option>
			<option value="1RA. COM. VALDIVIA">1RA. COM. VALDIVIA</option>
			<option value="1RA. COM. VINA DEL MAR">1RA. COM. VINA DEL MAR</option>
			<option value="1RA. COM. PUNTA ARENAS U">1RA. COM. PUNTA ARENAS U</option>
			<option value="20A. COM. PUENTE ALTO">20A. COM. PUENTE ALTO</option>
			<option value="21A. COM. EST. CENTRAL">21A. COM. EST. CENTRAL</option>
			<option value="22A. COM. QUINTA NORMAL">22A. COM. QUINTA NORMAL</option>
			<option value="23A. COM. TALAGANTE">23A. COM. TALAGANTE</option>
			<option value="24A. COM. MELIPILLA">24A. COM. MELIPILLA</option>
			<option value="25A. COM. MAIPU">25A. COM. MAIPU</option>
			<option value="26A. COM. PUDAHUEL">26A. COM. PUDAHUEL</option>
			<option value="27A. COM. AEROPUERTO INTERNACIONAL">27A. COM. AEROPUERTO INTERNACIONAL</option>
			<option value="2DA. COM. ANTOFAGASTA">2DA. COM. ANTOFAGASTA</option>
			<option value="2DA. COM. AYSEN">2DA. COM. AYSEN</option>
			<option value="2DA. COM. CARTAGENA">2DA. COM. CARTAGENA</option>
			<option value="2DA. COM. CASTRO">2DA. COM. CASTRO</option>
			<option value="2DA. COM. CENTRAL VALPO.">2DA. COM. CENTRAL VALPO.</option>
			<option value="2DA. COM. CHANCO">2DA. COM. CHANCO</option>
			<option value="2DA. COM. CHILLAN">2DA. COM. CHILLAN</option>
			<option value="2DA. COM. COLLIPULLI">2DA. COM. COLLIPULLI</option>
			<option value="2DA. COM. CONCEPCION">2DA. COM. CONCEPCION</option>
			<option value="2DA. COM. CONSTITUCION">2DA. COM. CONSTITUCION</option>
			<option value="2DA. COM. COPIAPO">2DA. COM. COPIAPO</option>
			<option value="2DA. COM. COQUIMBO">2DA. COM. COQUIMBO</option>
			<option value="2DA. COM. GRANEROS">2DA. COM. GRANEROS</option>
			<option value="2DA. COM. LEBU">2DA. COM. LEBU</option>
			<option value="2DA. COM. LICANTEN">2DA. COM. LICANTEN</option>
			<option value="2DA. COM. LOS LAGOS">2DA. COM. LOS LAGOS	</option>
			<option value="2DA. COM. MULCHEN">2DA. COM. MULCHEN</option>
			<option value="2DA. COM. POZO ALMONTE">2DA. COM. POZO ALMONTE</option>
			<option value="2DA. COM. PTO. MONTT">2DA. COM. PTO. MONTT</option>
			<option value="2DA. COM. PTO. NATALES">2DA. COM. PTO. NATALES</option>
			<option value="2DA. COM. PUTRE">2DA. COM. PUTRE</option>
			<option value="2DA. COM. QUILPUE">2DA. COM. QUILPUE</option>
			<option value="2DA. COM. RIO NEGRO">2DA. COM. RIO NEGRO</option>
			<option value="2DA. COM. SAN FELIPE">2DA. COM. SAN FELIPE</option>
			<option value="2DA. COM. SANTA CRUZ">2DA. COM. SANTA CRUZ</option>
			<option value="2DA. COM. SANTIAGO">2DA. COM. SANTIAGO</option>
			<option value="2DA. COM. TALCAHUANO">2DA. COM. TALCAHUANO</option>
			<option value="2DA. COM. TEMUCO">2DA. COM. TEMUCO</option>
			<option value="2DA. COM. SAN PEDRO DE ATACAMA (F)">2DA. COM. SAN PEDRO DE ATACAMA (F)</option>
			<option value="31A. COM. SAN RAMON">31A. COM. SAN RAMON</option>
			<option value="33A. COM. NUNOA">33A. COM. NUNOA</option>
			<option value="34A. COM. VISTA ALEGRE">34A. COM. VISTA ALEGRE</option>
			<option value="36A. COM. LA FLORIDA">36A. COM. LA FLORIDA</option>
			<option value="37A. COM. VITACURA">37A. COM. VITACURA</option>
			<option value="38A. COM. PUENTE ALTO">38A. COM. PUENTE ALTO</option>
			<option value="39A. COM. EL BOSQUE">39A. COM. EL BOSQUE</option>
			<option value="3RA. COM. ALGARROBO">3RA. COM. ALGARROBO</option>
			<option value="3RA. COM. ALTO HOSPICIO">3RA. COM. ALTO HOSPICIO</option>
			<option value="3RA. COM. ANTOFAGASTA">3RA. COM. ANTOFAGASTA</option>
			<option value="3RA. COM. ARICA">3RA. COM. ARICA</option>
			<option value="3RA. COM. BULNES">3RA. COM. BULNES</option>
			<option value="3RA. COM. CANETE">3RA. COM. CANETE</option>
			<option value="3RA. COM. CHILE CHICO F">3RA. COM. CHILE CHICO F</option>
			<option value="3RA. COM. FUTALEUFU F">3RA. COM. FUTALEUFU F</option>
			<option value="3RA. COM. LA UNION">3RA. COM. LA UNION</option>
			<option value="3RA. COM. LIMACHE">3RA. COM. LIMACHE</option>
			<option value="3RA. COM. LOS ANDES">3RA. COM. LOS ANDES</option>
			<option value="3RA. COM. LOTA">3RA. COM. LOTA</option>
			<option value="3RA. COM. MAULLIN">3RA. COM. MAULLIN</option>
			<option value="3RA. COM. NACIMIENTO">3RA. COM. NACIMIENTO</option>
			<option value="3RA. COM. NORTE VALPO.">3RA. COM. NORTE VALPO.</option>
			<option value="3RA. COM. OSORNO">3RA. COM. OSORNO</option>
			<option value="3RA. COM. OVALLE">3RA. COM. OVALLE</option>
			<option value="3RA. COM. PARRAL">3RA. COM. PARRAL</option>
			<option value="3RA. COM. PENCO">3RA. COM. PENCO</option>
			<option value="3RA. COM. PICHILEMU">3RA. COM. PICHILEMU</option>
			<option value="3RA. COM. PORVENIR">3RA. COM. PORVENIR</option>
			<option value="3RA. COM. SANTIAGO">3RA. COM. SANTIAGO</option>
			<option value="3RA. COM. TALCA">3RA. COM. TALCA</option>
			<option value="3RA. COM. TENO">3RA. COM. TENO</option>
			<option value="3RA. COM. TRAIGUEN">3RA. COM. TRAIGUEN</option>
			<option value="3RA. COM. VALLENAR">3RA. COM. VALLENAR</option>
			<option value="3RA. COM. PADRE LAS CASAS">3RA. COM.PADRE LAS CASAS</option>
			<option value="3RA. COM. RANCAGUA ORIENTE">3RA. COM. RANCAGUA ORIENTE</option>
			<option value="41A. COM. LA PINTANA">41A. COM. LA PINTANA</option>
			<option value="43A. COM. PENALOLEN">43A. COM. PENALOLEN</option>
			<option value="44A. COM. LO PRADO">44A. COM. LO PRADO</option>
			<option value="45A. COM. CERRO NAVIA">45A. COM. CERRO NAVIA</option>
			<option value="46A. COM. MACUL">46A. COM. MACUL</option>
			<option value="47A. COM. LOS DOMINICOS">47A. COM. LOS DOMINICOS</option>
			<option value="49A. COM. QUILICURA">49A. COM. QUILICURA</option>
			<option value="4TA. COM. CALBUCO">4TA. COM. CALBUCO</option>
			<option value="4TA. COM. CANCHA RAYADA">4TA. COM. CANCHA RAYADA</option>
			<option value="4TA. COM. CAUQUENES">4TA. COM. CAUQUENES</option>
			<option value="4TA. COM. CAVANCHA">4TA. COM. CAVANCHA</option>
			<option value="4TA. COM. CHAITEN F">4TA. COM. CHAITEN F</option>
			<option value="4TA. COM. COCHRANE F">4TA. COM. COCHRANE F</option>
			<option value="4TA. COM. CON CON">4TA. COM. CON CON</option>
			<option value="4TA. COM. CORONEL">4TA. COM. CORONEL</option>
			<option value="4TA. COM. CURANILAHUE">4TA. COM. CURANILAHUE</option>
			<option value="4TA. COM. EL SALVADOR">4TA. COM. EL SALVADOR</option>
			<option value="4TA. COM. HUALPEN">4TA. COM. HUALPEN</option>
			<option value="4TA. COM. ILLAPEL">4TA. COM. ILLAPEL</option>
			<option value="4TA. COM. MOLINA">4TA. COM. MOLINA</option>
			<option value="4TA. COM. NUEVA IMPERIAL">4TA. COM. NUEVA IMPERIAL</option>
			<option value="4TA. COM. PTO. WILLIAMS (F)">4TA. COM. PTO. WILLIAMS (F)</option>
			<option value="4TA. COM. QUILLOTA">4TA. COM. QUILLOTA</option>
			<option value="4TA. COM. RENGO">4TA. COM. RENGO</option>
			<option value="4TA. COM. RIO BUENO">4TA. COM. RIO BUENO</option>
			<option value="4TA. COM. SANTIAGO">4TA. COM. SANTIAGO</option>
			<option value="4TA. COM. TOCOPILLA">4TA. COM. TOCOPILLA</option>
			<option value="4TA. COM. VICTORIA">4TA. COM. VICTORIA</option>
			<option value="4TA. COM. YUNGAY">4TA. COM. YUNGAY</option>
			<option value="4TA. COM. SANTA BARBARA">4TA. COM. SANTA BARBARA</option>
			<option value="4TA. COM. CHACALLUTA (F)">4TA.COM. CHACALLUTA (F)</option>
			<option value="50A. COM. SAN JOAQUIN">50A. COM. SAN JOAQUIN</option>
			<option value="51A. COM. PEDRO AGUIRRE CERDA">51A. COM. PEDRO AGUIRRE CERDA</option>
			<option value="52A. COM. RINCONADA DE MAIPU">52A. COM. RINCONADA DE MAIPU</option>
			<option value="53A. COM. LO BARNECHEA">53A. COM. LO BARNECHEA</option>
			<option value="54A. COM. HUECHURABA">54A. COM. HUECHURABA</option>
			<option value="55A. COM.  SUBOF. CRISTIAN VERA C.">55A. COM.  SUBOF. CRISTIAN VERA C.</option>
			<option value="56A. COM. PENAFLOR">56A. COM. PENAFLOR</option>
			<option value="58A. COM. POB. ALESSANDRI">58A. COM. POB. ALESSANDRI</option>
			<option value="59A. COM. LAMPA">59A. COM. LAMPA</option>
			<option value="5TA. COM. CASABLANCA">5TA. COM. CASABLANCA</option>
			<option value="5TA. COM. CONCHALI">5TA. COM. CONCHALI</option>
			<option value="5TA. COM. CURACAUTIN">5TA. COM. CURACAUTIN</option>
			<option value="5TA. COM. LA PORTADA">5TA. COM. LA PORTADA</option>
			<option value="5TA. COM. PALENA F">5TA. COM. PALENA F</option>
			<option value="5TA. COM. PANGUIPULLI">5TA. COM. PANGUIPULLI</option>
			<option value="5TA. COM. PEUMO">5TA. COM. PEUMO</option>
			<option value="5TA. COM. PITRUFQUEN">5TA. COM. PITRUFQUEN</option>
			<option value="5TA. COM. PTO.MONTT">5TA. COM. PTO.MONTT</option>
			<option value="5TA. COM. QUIRIHUE">5TA. COM. QUIRIHUE</option>
			<option value="5TA. COM. SAN JAVIER">5TA. COM. SAN JAVIER</option>
			<option value="5TA. COM. VICUNA">5TA. COM. VICUNA</option>
			<option value="5TA. COM. VINA DEL MAR">5TA. COM. VINA DEL MAR</option>
			<option value="5TA. COM. YUMBEL">5TA. COM. YUMBEL</option>
			<option value="61A. COM.CABO 2DO.PABLO.SILVA P.">61A. COM.CABO 2DO.PABLO.SILVA P.</option>
			<option value="62A. COM. SAN BERNARDO">62A. COM. SAN BERNARDO</option>
			<option value="63A. COM. CURACAVI">63A. COM. CURACAVI</option>
			<option value="64A. COM. PAINE">64A. COM. PAINE</option>
			<option value="65A. COM. PIRQUE">65A. COM. PIRQUE</option>
			<option value="66A. COM. BAJOS DE MENA">66A.COM. BAJOS DE MENA</option>
			<option value="6TA. COM. ALERCE (S.U.)">6TA. COM. ALERCE (S.U.)</option>
			<option value="6TA. COM. CHILLAN VIEJO (S.U)">6TA. COM. CHILLAN VIEJO (S.U)</option>
			<option value="6TA. COM. ISLA-PASCUA (F)">6TA. COM. ISLA-PASCUA (F)</option>
			<option value="6TA. COM. LAS COMPANIAS">6TA. COM. LAS COMPANIAS</option>
			<option value="6TA. COM. LONCOCHE">6TA. COM. LONCOCHE</option>
			<option value="6TA. COM. QUELLON">6TA. COM. QUELLON</option>
			<option value="6TA. COM. RECOLETA">6TA. COM. RECOLETA</option>
			<option value="6TA. COM. SAN PEDRO DE LA PAZ">6TA. COM. SAN PEDRO DE LA PAZ</option>
			<option value="6TA. COM. SAN VICENTE">6TA. COM. SAN VICENTE</option>
			<option value="6TA. COM. VILLA ALEMANA">6TA. COM. VILLA ALEMANA</option>
			<option value="7MA. COM LA CALERA">7MA. COM LA CALERA</option>
			<option value="7MA. COM. CHIGUAYANTE">7MA. COM. CHIGUAYANTE</option>
			<option value="7MA. COM. MIRASOL">7MA. COM. MIRASOL</option>
			<option value="7MA. COM. RENCA">7MA. COM. RENCA</option>
			<option value="7MA. COM. VILLARRICA">7MA. COM. VILLARRICA</option>
			<option value="8VA. COM. COLINA">8VA. COM. COLINA</option>
			<option value="8VA. COM. FLORIDA VALPO.">8VA. COM. FLORIDA VALPO.</option>
			<option value="8VA. COM. TEMUCO">8VA. COM. TEMUCO</option>
			<option value="9NA. COM. INDEPENDENCIA">9NA. COM. INDEPENDENCIA</option>
			<option value="9NA. COM. PUCON">9NA.COM. PUCON</option>
		
		
		  	  
		</select>
	  </div>
	</div>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
    <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Provincia</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_provincia" name="cbo_provincia" required >

<option value="Antartica Chilena">Antartica Chilena</option>
<option value="Antofagasta">Antofagasta</option>
<option value="Arauco">Arauco</option>
<option value="Arica">Arica</option>
<option value="Aysén">Aysén</option>
<option value="Biobio">Biobio</option>
<option value="Cachapoal">Cachapoal</option>
<option value="Capitan Prat">Capitan Prat</option>
<option value="Cardenal Caro">Cardenal Caro</option>
<option value="Cauquenes">Cauquenes</option>
<option value="Cautín">Cautín</option>
<option value="Chacabuco">Chacabuco</option>
<option value="Chañaral">Chañaral</option>
<option value="Chiloé">Chiloé</option>
<option value="Choapa">Choapa</option>
<option value="Coihaique">Coihaique</option>
<option value="Colchagua">Colchagua</option>
<option value="Concepción">Concepción</option>
<option value="Copiapo">Copiapo</option>
<option value="Cordillera">Cordillera</option>
<option value="Curico">Curico</option>
<option value="Del Tamarugal">Del Tamarugal</option>
<option value="Diguillín">Diguillín</option>
<option value="El Loa">El Loa</option>
<option value="Elqui">Elqui</option>
<option value="General Carrera">General Carrera</option>
<option value="Huasco">Huasco</option>
<option value="Iquique">Iquique</option>
<option value="Isla de Pascua">Isla de Pascua</option>
<option value="Itata">Itata</option>
<option value="Limari">Limari</option>
<option value="Linares">Linares</option>
<option value="Llanquihue">Llanquihue</option>
<option value="Los Andes">Los Andes</option>
<option value="Magallanes">Magallanes</option>
<option value="Maipo">Maipo</option>
<option value="Malleco">Malleco</option>
<option value="Marga Marga">Marga Marga</option>
<option value="Melipilla">Melipilla</option>
<option value="Osorno">Osorno</option>
<option value="Palena">Palena</option>
<option value="Parinacota">Parinacota</option>
<option value="Petorca">Petorca</option>
<option value="Punilla">Punilla</option>
<option value="Quillota">Quillota</option>
<option value="Ranco">Ranco</option>
<option value="San Antonio">San Antonio</option>
<option value="San Felipe de Aconcagua">San Felipe de Aconcagua</option>
<option value="Santiago">Santiago</option>
<option value="Talagante">Talagante</option>
<option value="Talca">Talca</option>
<option value="Tierra del Fuego">Tierra del Fuego</option>
<option value="Tocopilla">Tocopilla</option>
<option value="Ultima Esperanza">Ultima Esperanza</option>
<option value="Valdivia">Valdivia</option>
<option value="Valparaíso">Valparaíso</option>


		  
		  	  
		</select>
	  </div>
	</div>
  </div>
  </div>
	</div>
  </div>
</div>

<hr>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body" style="padding-top:0px;padding-bottom:10px;">
<div class="form-group">
<br><input type="submit" name="guardar_evento" id="guardar_evento" class="btn btn-primary submit-btn btn-block" value="Guardar evento">
</div>
</div>
</div>
</div>

	  </form>
<!-- tab1 end -->
					</div>
				</div>
				<div class="tab-pane" id="2b">
					<div class="tab_margin">
<!-- tab2 ini -->
<form class="form-sample" method="post" action="add_evento.php">
<input type="hidden" id="rut" name="rut" value="">

<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">


<!--
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Cantidad</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Cantidad..." id="txtzonas" name="txtzonas" value="" step="1"/>
	  </div>
	</div>
  </div>

      
  -->
  
  
    <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Id Evento</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_id_evento_detenido" name="cbo_id_evento_detenido" required >
		    <?php

                //    $mysqli = new mysqli('localhost', 'root', '', 'fcop');
                 //   $mysqli->set_charset("utf8");
                    $query = $mysqli -> query ("SELECT * FROM evento order by id_evento desc");
						  while ($valores = $mysqli ->resultado -> fetch_array()) {
                     //   while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_evento'].'">'.$valores['id_evento'].'</option>';
                                            }
											
											
                ?>

		</select>
		

	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Edad</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Edad..." id="txt_edad_detenido" name="txt_edad_detenido" value="" min="0" required />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Género</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_genero_detenido" name="cbo_genero_detenido" required >
		  <option value="Mujer">Mujer</option>
		  <option value="Hombre">Hombre</option>
		</select>
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Motivo</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_motivo_detenido" name="cbo_motivo_detenido">
		  <option value="Desórdenes graves">Desórdenes graves</option>
		  <option value="Desórdenes simples">Desórdenes simples</option>
		  <option value="Daños">Daños</option>
		  <option value="Daños patrimoniales">Daños patrimoniales</option>
		  <option value="Daños a la propiedad pública">Daños a la propiedad pública</option>
		  <option value="Daños fiscales">Daños fiscales</option>
		  <option value="Atentado a la autoridad">Atentado a la autoridad</option>
		  <option value="Oponerse a la acción de Carabineros de servicio">Oponerse a la acción de Carabineros de servicio</option>
		  <option value="Maltrato de obra de Carabineros de servicio">Maltrato de obra de Carabineros de servicio</option>
		  <option value="Porte y lanzamientos de bombas incendiarias ART 3, letra B, ley control de armas">Porte y lanzamientos de bombas incendiarias ART 3, letra B, ley control de armas</option>
		  <option value="Usurpación de identidad">Usurpación de identidad</option>
		  <option value="Orden de aprehensión vigente">Orden de aprehensión vigente</option>
		  <option value="Robo con fuerza">Robo con fuerza</option>
		  <option value="Robo con violencia">Robo con violencia</option>
		  <option value="Robo con intimidación">Robo con intimidación</option>
		  <option value="Riña">Riña</option>
		  <option value="Amenazas">Amenazas</option>
		  <option value="Porte arma blanca">Porte arma blanca</option>
		  <option value="Usurpación violenta de inmueble">Usurpación violenta de inmueble</option>
		  <option value="Usurpación no violenta de inmueble<">Usurpación no violenta de inmueble</option>
		  <option value="Infracción LEY 20.000">Infracción LEY 20.000</option>
		  <option value="Infringir Art 25 LEY 19.925">Infringir Art 25 LEY 19.925</option>
		  <option value="Infringir Art 26 LEY 19.925">Infringir Art 26 LEY 19.925</option>
		  <option value="Infracción LEY 17.798, Art 2, letra F, (fuegos artificiales, artículos pirotécnicos y otros de similar naturaleza)">Infracción LEY 17.798, Art 2, letra F, (fuegos artificiales, artículos pirotécnicos y otros de similar naturaleza)</option>
		  <option value="Vulneración de derechos">Vulneración de derechos</option>
		  <option value="Porte de arma de fuego">Porte de arma de fuego</option>
		</select>
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Lesiones</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_lesiones_detenido" name="cbo_lesiones_detenido">
		  <option value="Ninguna">Ninguna</option>
		  <option value="Leves">Leves</option>
		  <option value="Menos graves">Menos graves</option>
		  <option value="Graves">Graves</option>
		  <option value="Gravísimas">Gravísimas</option>
		</select>
	  </div>
	</div>
  </div>  
  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">N° de parte (0 si no existe)</label>
	  <div class="col-sm-8">
	
		<input type="number" class="form-control" placeholder="Ingrese 0 si no existe Parte" id="txt_parte_detenido" name="txt_parte_detenido" value="" required  />
	
	
	  </div>
	</div>
  </div>  
  
</div>
</div>
</div>
</div>


<hr>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body" style="padding-top:0px;padding-bottom:10px;">
<div class="form-group">
<br><input type="submit" name="guardar_detenido" id="guardar_detenido" class="btn btn-primary submit-btn btn-block" value="Guardar detenido">
</div>
</div>
</div>
</div>
  
</form>
<!-- tab2 end -->
					</div>
				</div>
				<div class="tab-pane" id="3b">
					<div class="tab_margin">
<!-- tab3 ini -->
<form class="form-sample" method="post" action="">
<input type="hidden" id="rut" name="rut" value="">

<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">

<!--
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Cantidad</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Cantidad..." id="txtzonas" name="txtzonas" value="" step="1"/>
	  </div>
	</div>
  </div>

  -->
  

   <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Id Evento</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_id_evento_persona" name="cbo_id_evento_persona" required >
		    <?php

                //    $mysqli = new mysqli('localhost', 'root', '', 'fcop');
                //    $mysqli->set_charset("utf8");
                    $query = $mysqli -> query ("SELECT * FROM evento order by id_evento desc");
					      while ($valores = $mysqli ->resultado -> fetch_array()) {
                      //  while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_evento'].'">'.$valores['id_evento'].'</option>';
                                            }
											
											
                ?>

		</select>
		

	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Edad</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Edad..." id="txt_edad_lesionado" name="txt_edad_lesionado" value="" min="0" step="1" required />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Género</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_genero_lesionado" name="cbo_genero_lesionado">
		  <option value="Femenino">Femenino</option>
		  <option value="Masculino">Masculino</option>
		</select>
	  </div>
	</div>
  </div>
  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Lesiones</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_lesiones_lesionado" name="cbo_lesiones_lesionado">
		  <option value="Leves">Leves</option>
		  <option value="Menos graves">Menos graves</option>
		  <option value="Graves">Graves</option>
		  <option value="Gravísimas">Gravísimas</option>
		  <option value="Fallecida">Fallecida</option>
		</select>
	  </div>
	</div>
  </div>  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Causa</label>
	  <div class="col-sm-8">
		
		<select class="form-control" id="cbo_causa_lesionado" name="cbo_causa_lesionado">
		  <option value="Por intervención de Carabineros">Por intervención de Carabineros</option>
		  <option value="Por acción de manifestantes">Por acción de manifestantes</option>
		  <option value="Riña">Riña</option>
		  <option value="Accidente">Accidente</option>
		</select>
		

	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Motivo</label>
	  <div class="col-sm-8">
		
		<select class="form-control" id="cbo_motivo_lesionado" name="cbo_motivo_lesionado">
		  <option value="Golpes">Golpes</option>
		  <option value="Caída">Caída</option>
		  <option value="Atropello">Atropello</option>
		  <option value="Quemadura">Quemadura</option>
		  <option value="Forcejeo">Forcejeo</option>
		</select>
		
		
	  </div>
	</div>
  </div>
  
  
   <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">N° de parte (0 si no existe)</label>
	  <div class="col-sm-8">
		
		<input type="number" class="form-control" placeholder="Ingrese 0 si no existe Parte" id="txt_parte_lesionado" name="txt_parte_lesionado" value="" step="1" required />
		
		
	  </div>
	</div>
  </div>
  
  
  
</div>
</div>
</div>
</div>


<hr>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body" style="padding-top:0px;padding-bottom:10px;">
<div class="form-group">
<br><input type="submit" name="guardar_persona_lesionada" id="guardar_persona_lesionada" class="btn btn-primary submit-btn btn-block" value="Guardar lesionado">
</div>
</div>
</div>
</div>
  
</form>
<!-- tab3 end -->
					</div>
				</div>
				<div class="tab-pane" id="4b">
					<div class="tab_margin">
<!-- tab4 ini -->
<form class="form-sample" method="post" action="">
<input type="hidden" id="rut" name="rut" value="">

<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">


<!--
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Cantidad</label>
	  <div class="col-sm-8">
		<input type="number" class="form-control" placeholder="Cantidad..." id="txtzonas" name="txtzonas" value="" step="1"/>
	  </div>
	</div>
  </div>
  -->
  
    <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Id Evento</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_id_evento_carabinero" name="cbo_id_evento_carabinero" required >
		    <?php

                //    $mysqli = new mysqli('localhost', 'root', '', 'fcop');
                 //   $mysqli->set_charset("utf8");
                    $query = $mysqli -> query ("SELECT * FROM evento order by id_evento desc");
				          while ($valores = $mysqli ->resultado -> fetch_array()) {
                   //     while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_evento'].'">'.$valores['id_evento'].'</option>';
                                            }
											
											
                ?>

		</select>
		

	  </div>
	</div>
  </div>
  
  
  
  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Código</label>
	  <div class="col-sm-8">
		<input type="textarea" class="form-control" placeholder="Código..." id="txt_codigo_carabinero" name="txt_codigo_carabinero" value="" required  />
	  </div>
	</div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Lesiones</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_lesiones_carabinero" name="cbo_lesiones_carabinero" required >
	
		  <option value="Leves">Leves</option>
		  <option value="Menos graves">Menos graves</option>
		  <option value="Graves">Graves</option>
		  <option value="Gravísimas">Gravísimas</option>
		  <option value="Fallecido">Fallecido</option>
			
		</select>
	  </div>
	</div>
  </div>  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Motivo</label>
	  <div class="col-sm-8">
			<select class="form-control" id="cbo_motivo_carabinero" name="cbo_motivo_carabinero" required >
		  <option value="Golpes">Golpes</option>
		  <option value="Caída">Caída</option>
		  <option value="Atropello">Atropello</option>
		  <option value="Quemadura">Quemadura</option>
		  <option value="Ataque con arma de fuego">Ataque con arma de fuego</option>
		  <option value="Ataque con arma blanca">Ataque con arma blanca</option>
		  <option value="Quemadura producida por lanzamiento de fuegos pirotécnicos">Quemadura producida por lanzamiento de fuegos pirotécnicos</option>
		  <option value="Desgarro muscular">Desgarro muscular</option>
		  <option value="Forcejeo">Forcejeo</option>
		  <option value="Elemento contundente">Elemento contundente</option>
		</select>
	  </div>
	</div>
  </div>
  
   <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">N° de parte (0 si no existe)</label>
	  <div class="col-sm-8">
		
		<input type="number" class="form-control" placeholder="Ingrese 0 si no existe Parte" id="txt_parte_carabinero" name="txt_parte_carabinero" value="" step="1" required />
		
		
	  </div>
	</div>
  </div>
  
  
  
</div>
</div>
</div>
</div>


<hr>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body" style="padding-top:0px;padding-bottom:10px;">
<div class="form-group">
<br><input type="submit" name="guardar_carabinero_lesionado" id="guardar_carabinero_lesionado" class="btn btn-primary submit-btn btn-block" value="Guardar Carabinero lesionado">
</div>
</div>
</div>
</div>
  
</form>
<!-- tab4 end -->
					</div>
				</div>
				<div class="tab-pane" id="5b">
					<div class="tab_margin">
<!-- tab5 ini -->


<form class="form-sample" method="post" action="">


<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">
  
      <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Id Evento</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_id_evento_danos" name="cbo_id_evento_danos" required >
		    <?php

               //     $mysqli = new mysqli('localhost', 'root', '', 'fcop');
               //     $mysqli->set_charset("utf8");
                    $query = $mysqli -> query ("SELECT * FROM evento order by id_evento desc");
						  while ($valores = $mysqli ->resultado -> fetch_array()) {
                   //     while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="'.$valores['id_evento'].'">'.$valores['id_evento'].'</option>';
                                            }
											
											
                ?>

		</select>
		

	  </div>
	</div>
  </div>
  
  
  
  
  <div class="col-md-6">
	<div class="form-group row">
	  <label class="col-sm-4 col-form-label">Tipo</label>
	  <div class="col-sm-8">
		<select class="form-control" id="cbo_danos_tipo" name="cbo_danos_tipo">
		  <option value="Fiscales">Fiscales</option>
		  <option value="Uso público">Uso público</option>
		  <option value="Privado">Privado</option>
		</select>
	  </div>
	</div>
  </div>  
  
</div>
</div>
</div>
</div>


<hr>
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body" style="padding-top:0px;padding-bottom:10px;">
<div class="form-group">
<br><input type="submit" name="guardar_dano" id="guardar_dano" class="btn btn-primary submit-btn btn-block" value="Guardar daño">
</div>
</div>
</div>
</div>
  
</form>
<!-- tab5 end -->
					</div>
				</div>
				<div class="tab-pane" id="6b">
					<div class="tab_margin">
<!-- tab6 ini -->

<!-- tab6 end -->
					</div>
				</div>
				<div class="tab-pane" id="7b">
					<div class="tab_margin">
<!-- tab7 ini -->
<form class="form-sample" method="post" action="">
<input type="hidden" id="rut" name="rut" value="">

<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="row">

  <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="form-group row"></div>
  <div class="form-group row"></div>
  <div class="form-group row"></div>
	<div class="form-group row">
	  <div class="col-sm-6 text-center">
		<img src="img/down_xls_48px.png"><br>
		EVENTOS
	  </div>
	  <div class="col-sm-6 text-center">
		<img src="img/down_xls_48px.png"><br>
		RECLAMOS
	  </div>
	</div>
  </div>  
  
</div>
</div>
</div>
</div>

  
</form>
<!-- tab7 end -->
				</div>
				</div>
			</div>
		</div>
		<!-- tabbed panel end -->
<script>
function setSelectBoxByText(eid, etxt) {
	var eid = document.getElementById(eid);
	for (var i = 0; i < eid.options.length; ++i) {
		if (eid.options[i].text === etxt)
			eid.options[i].selected = true;
	}
}
	
var RegionesYcomunas = {

	"regiones": [{
			"NombreRegion": "Arica y Parinacota",
			"comunas": ["Arica", "Camarones", "Putre", "General Lagos"]
	},
		{
			"NombreRegion": "Tarapacá",
			"comunas": ["Iquique", "Alto Hospicio", "Pozo Almonte", "Camiña", "Colchane", "Huara", "Pica"]
	},
		{
			"NombreRegion": "Antofagasta",
			"comunas": ["Antofagasta", "Mejillones", "Sierra Gorda", "Taltal", "Calama", "Ollagüe", "San Pedro de Atacama", "Tocopilla", "María Elena"]
	},
		{
			"NombreRegion": "Atacama",
			"comunas": ["Copiapó", "Caldera", "Tierra Amarilla", "Chañaral", "Diego de Almagro", "Vallenar", "Alto del Carmen", "Freirina", "Huasco"]
	},
		{
			"NombreRegion": "Coquimbo",
			"comunas": ["La Serena", "Coquimbo", "Andacollo", "La Higuera", "Paiguano", "Vicuña", "Illapel", "Canela", "Los Vilos", "Salamanca", "Ovalle", "Combarbalá", "Monte Patria", "Punitaqui", "Río Hurtado"]
	},
		{
			"NombreRegion": "Valparaíso",
			"comunas": ["Valparaíso", "Casablanca", "Concón", "Juan Fernández", "Puchuncaví", "Quintero", "Viña del Mar", "Isla de Pascua", "Los Andes", "Calle Larga", "Rinconada", "San Esteban", "La Ligua", "Cabildo", "Papudo", "Petorca", "Zapallar", "Quillota", "Calera", "Hijuelas", "La Cruz", "Nogales", "San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo", "Santo Domingo", "San Felipe", "Catemu", "Llaillay", "Panquehue", "Putaendo", "Santa María", "Quilpué", "Limache", "Olmué", "Villa Alemana"]
	},
		{
			"NombreRegion": "Región del Libertador Gral. Bernardo O’Higgins",
			"comunas": ["Rancagua", "Codegua", "Coinco", "Coltauco", "Doñihue", "Graneros", "Las Cabras", "Machalí", "Malloa", "Mostazal", "Olivar", "Peumo", "Pichidegua", "Quinta de Tilcoco", "Rengo", "Requínoa", "San Vicente", "Pichilemu", "La Estrella", "Litueche", "Marchihue", "Navidad", "Paredones", "San Fernando", "Chépica", "Chimbarongo", "Lolol", "Nancagua", "Palmilla", "Peralillo", "Placilla", "Pumanque", "Santa Cruz"]
	},
		{
			"NombreRegion": "Región del Maule",
			"comunas": ["Talca", "ConsVtución", "Curepto", "Empedrado", "Maule", "Pelarco", "Pencahue", "Río Claro", "San Clemente", "San Rafael", "Cauquenes", "Chanco", "Pelluhue", "Curicó", "Hualañé", "Licantén", "Molina", "Rauco", "Romeral", "Sagrada Familia", "Teno", "Vichuquén", "Linares", "Colbún", "Longaví", "Parral", "ReVro", "San Javier", "Villa Alegre", "Yerbas Buenas"]
	},
		{
			"NombreRegion": "Región del Biobío",
			"comunas": ["Concepción", "Coronel", "Chiguayante", "Florida", "Hualqui", "Lota", "Penco", "San Pedro de la Paz", "Santa Juana", "Talcahuano", "Tomé", "Hualpén", "Lebu", "Arauco", "Cañete", "Contulmo", "Curanilahue", "Los Álamos", "Tirúa", "Los Ángeles", "Antuco", "Cabrero", "Laja", "Mulchén", "Nacimiento", "Negrete", "Quilaco", "Quilleco", "San Rosendo", "Santa Bárbara", "Tucapel", "Yumbel", "Alto Biobío", "Chillán", "Bulnes", "Cobquecura", "Coelemu", "Coihueco", "Chillán Viejo", "El Carmen", "Ninhue", "Ñiquén", "Pemuco", "Pinto", "Portezuelo", "Quillón", "Quirihue", "Ránquil", "San Carlos", "San Fabián", "San Ignacio", "San Nicolás", "Treguaco", "Yungay"]
	},
		{
			"NombreRegion": "Región de la Araucanía",
			"comunas": ["Temuco", "Carahue", "Cunco", "Curarrehue", "Freire", "Galvarino", "Gorbea", "Lautaro", "Loncoche", "Melipeuco", "Nueva Imperial", "Padre las Casas", "Perquenco", "Pitrufquén", "Pucón", "Saavedra", "Teodoro Schmidt", "Toltén", "Vilcún", "Villarrica", "Cholchol", "Angol", "Collipulli", "Curacautín", "Ercilla", "Lonquimay", "Los Sauces", "Lumaco", "Purén", "Renaico", "Traiguén", "Victoria", ]
	},
		{
			"NombreRegion": "Región de Los Ríos",
			"comunas": ["Valdivia", "Corral", "Lanco", "Los Lagos", "Máfil", "Mariquina", "Paillaco", "Panguipulli", "La Unión", "Futrono", "Lago Ranco", "Río Bueno"]
	},
		{
			"NombreRegion": "Región de Los Lagos",
			"comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "FruVllar", "Los Muermos", "Llanquihue", "Maullín", "Puerto Varas", "Castro", "Ancud", "Chonchi", "Curaco de Vélez", "Dalcahue", "Puqueldón", "Queilén", "Quellón", "Quemchi", "Quinchao", "Osorno", "Puerto Octay", "Purranque", "Puyehue", "Río Negro", "San Juan de la Costa", "San Pablo", "Chaitén", "Futaleufú", "Hualaihué", "Palena"]
	},
		{
			"NombreRegion": "Región Aisén del Gral. Carlos Ibáñez del Campo",
			"comunas": ["Coihaique", "Lago Verde", "Aisén", "Cisnes", "Guaitecas", "Cochrane", "O’Higgins", "Tortel", "Chile Chico", "Río Ibáñez"]
	},
		{
			"NombreRegion": "Región de Magallanes y de la AntárVca Chilena",
			"comunas": ["Punta Arenas", "Laguna Blanca", "Río Verde", "San Gregorio", "Cabo de Hornos (Ex Navarino)", "AntárVca", "Porvenir", "Primavera", "Timaukel", "Natales", "Torres del Paine"]
	},
		{
			"NombreRegion": "Región Metropolitana de Santiago",
			"comunas": ["Cerrillos", "Cerro Navia", "Conchalí", "El Bosque", "Estación Central", "Huechuraba", "Independencia", "La Cisterna", "La Florida", "La Granja", "La Pintana", "La Reina", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipú", "Ñuñoa", "Pedro Aguirre Cerda", "Peñalolén", "Providencia", "Pudahuel", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Joaquín", "San Miguel", "San Ramón", "Vitacura", "Puente Alto", "Pirque", "San José de Maipo", "Colina", "Lampa", "TilVl", "San Bernardo", "Buin", "Calera de Tango", "Paine", "Melipilla", "Alhué", "Curacaví", "María Pinto", "San Pedro", "Talagante", "El Monte", "Isla de Maipo", "Padre Hurtado", "Peñaflor"]
	}]
}


jQuery(document).ready(function () {
 $(function() {
  $('#lengua').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
	var iRegion = 0;
	var htmlRegion = '<option value="sin-region">Seleccione región</option><option value="sin-region">--</option>';
	var htmlComunas = '<option value="sin-region">Seleccione comuna</option><option value="sin-region">--</option>';

	jQuery.each(RegionesYcomunas.regiones, function () {
		htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
		iRegion++;
	});

	jQuery('#regiones').html(htmlRegion);
	jQuery('#comunas').html(htmlComunas);

	jQuery('#regiones').change(function () {
		var iRegiones = 0;
		var valorRegion = jQuery(this).val();
		var htmlComuna = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-comuna">--</option>';
		jQuery.each(RegionesYcomunas.regiones, function () {
			if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
				var iComunas = 0;
				jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
					htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
					iComunas++;
				});
			}
			iRegiones++;
		});
		jQuery('#comunas').html(htmlComuna);
	});
	jQuery('#comunas').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		} else if (jQuery(this).val() == 'sin-comuna') {
			alert('selecciones Comuna');
		}
	});
	jQuery('#regiones').change(function () {
		if (jQuery(this).val() == 'sin-region') {
			alert('selecciones Región');
		}
	});
});
</script>

<script>
$(function () {
    $("#txt_fecha_inicio").datepicker({
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $("#txt_fecha_termino").datepicker({
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
});
</script>

<script>

$(document).ready(function()
{
    $("#txt_fecha_inicio").datepicker( "option", "yearRange", "-99:+0" );

    $("#txt_fecha_inicio").datepicker( "option", "maxDate", "+0m +0d" );
	
	$("#txt_fecha_termino").datepicker( "option", "yearRange", "-99:+0" );

    $("#txt_fecha_termino").datepicker( "option", "maxDate", "+0m +0d" );
	
	
});
</script>



	</div>
  </div>
  </div>
		
		</form>
		
		
		</div>
	  <!-- end content ###########################################################-->
        </div>
		</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="nada" style="width:100%;background-color:#175F27;height:80px">
          <div class="container-fluid clearfix" style="text-align:center">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="line-height:80px;color:white">
              Carabineros de Chile - DAC - Área de desarrollo informático 2019</span>
          </div>
        </footer>
        <!-- partial -->
  <!-- End custom js for this page-->
</body>

</html>


<?php
if(isset($_POST['guardar_evento'])){

$motivo=$_POST['cbo_motivo'];
$tipo_evento=$_POST['cbo_tipo_evento'];





$fecha_inicio=$_POST['txt_fecha_inicio'];
$fecha_termino=$_POST['txt_fecha_termino'];




$fecha_inicio=date("Y-m-d",strtotime($fecha_inicio));
$fecha_termino=date("Y-m-d",strtotime($fecha_termino));



$hora_inicio=$_POST['txt_hora_inicio'];
$hora_termino=$_POST['txt_hora_termino'];
$autorizado=$_POST['cbo_autorizado'];
$cant_asistentes=$_POST['txt_asistentes'];
$personal=$_POST['cbo_personal'];
$zona=$_POST['cbo_zona'];
$comisaria=$_POST['cbo_comisaria'];
$provincia=$_POST['cbo_provincia'];
$fecha_ingreso= date('Y-m-d');
//$v1 es el codigo de funcionario



//require("base_i.php");
//$mysqli=new basedatos();
//$b->query("select * from login where rut=$rut");
//echo "datos rut: ".$rut_no_dot;
//echo "datos rut: ".$rut;
//echo "datos verificador: ".$verificador;
//if($b->resultado->num_rows>0){echo '<script type="text/javascript">
    //    alert("El usuario ya existe");
  //   </script>';
//}else{
$mysqli->query("insert into evento values (Null, '$motivo','$tipo_evento','$fecha_inicio','$fecha_termino','$hora_inicio','$hora_termino','$autorizado',$cant_asistentes,'$personal','$zona','$provincia','$comisaria','$v1','$fecha_ingreso');");
if(isset($mysqli->mysqli_error))echo '<br>'.$mysqli->mysqli_error; 




                //    $mysqli = new mysqli('localhost', 'root', '', 'fcop');
                //    $mysqli->set_charset("utf8");
                    $query = $mysqli -> query ("SELECT MAX(id_evento) from evento");
				          while ($valores = $mysqli ->resultado -> fetch_array()) {
               //         while ($valores = mysqli_fetch_row($query)) {
                                   $id_mensaje= $valores[0];
                                            }
											
											
             



$mensaje_evento="Evento creado, El ID DEL EVENTO es el número :"." ".$id_mensaje. "\\n". "Use el ID de evento para ingresar datos en los menús correspondientes ";

//echo '<script>alert ("  '.$acumulador.' respuestas afirmativas");</script>';
//echo "<META HTTP-EQUIV='refresh' CONTENT='3; URL=index.php'>"; 

echo "<script>if(confirm('$mensaje_evento')){ 
document.location='add_evento.php';} 
</script>";  






}






?>
	  

  
	  
	  
	  
	  
<?php
if(isset($_POST['guardar_detenido'])){

$edad_detenido=$_POST['txt_edad_detenido'];
$genero_detenido=$_POST['cbo_genero_detenido'];
$motivo_detenido=$_POST['cbo_motivo_detenido'];
$lesiones_detenido=$_POST['cbo_lesiones_detenido'];
$parte_detenido=$_POST['txt_parte_detenido'];
$id_evento_detenido=$_POST['cbo_id_evento_detenido'];


//require("base_i.php");
//$b=new basedatos();
//$b->query("select * from login where rut=$rut");
//echo "datos rut: ".$rut_no_dot;
//echo "datos rut: ".$rut;
//echo "datos verificador: ".$verificador;
//if($b->resultado->num_rows>0){echo '<script type="text/javascript">
    //    alert("El usuario ya existe");
  //   </script>';
//}else{
$mysqli->query("insert into detenido values (Null, '$id_evento_detenido', '$edad_detenido','$genero_detenido','$motivo_detenido','$lesiones_detenido','$parte_detenido');");
if(isset($mysqli->mysqli_error))echo '<br>'.$mysqli->mysqli_error; 



$mensaje_evento="Detenido guardado para el evento con ID :"." ".$id_evento_detenido. "\\n";

echo "<script>if(confirm('$mensaje_evento')){ 
document.location='add_evento.php';} 
</script>";  



}

?>
	  
<?php
if(isset($_POST['guardar_persona_lesionada'])){
$id_evento_persona=$_POST['cbo_id_evento_persona'];
$edad_lesionado=$_POST['txt_edad_lesionado'];
$genero_lesionado=$_POST['cbo_genero_lesionado'];
$lesiones_lesionado=$_POST['cbo_lesiones_lesionado'];
$causa_lesionado=$_POST['cbo_causa_lesionado'];
$motivo_lesionado=$_POST['cbo_motivo_lesionado'];
$parte_lesionado=$_POST['txt_parte_lesionado'];


//require("base_i.php");
//$b=new basedatos();
//$b->query("select * from login where rut=$rut");
//echo "datos rut: ".$rut_no_dot;
//echo "datos rut: ".$rut;
//echo "datos verificador: ".$verificador;
//if($b->resultado->num_rows>0){echo '<script type="text/javascript">
    //    alert("El usuario ya existe");
  //   </script>';
//}else{
$mysqli->query("insert into persona_lesionada values (Null, '$id_evento_persona', '$edad_lesionado','$genero_lesionado','$lesiones_lesionado','$causa_lesionado','$motivo_lesionado','$parte_lesionado');");
if(isset($mysqli->mysqli_error))echo '<br>'.$mysqli->mysqli_error; 




$mensaje_evento="Persona lesionada guardada para el evento con ID :"." ".$id_evento_persona. "\\n";

echo "<script>if(confirm('$mensaje_evento')){ 
document.location='add_evento.php';} 
</script>";  



}

?>
	  
	  
	  
<?php
if(isset($_POST['guardar_carabinero_lesionado'])){
$id_evento_carabinero=$_POST['cbo_id_evento_carabinero'];
$codigo_carabinero=$_POST['txt_codigo_carabinero'];
$carabinero_lesionado=$_POST['cbo_lesiones_carabinero'];
$motivo_carabinero=$_POST['cbo_motivo_carabinero'];
$parte_carabinero=$_POST['txt_parte_carabinero'];



//require("base_i.php");
//$b=new basedatos();
//$b->query("select * from login where rut=$rut");
//echo "datos rut: ".$rut_no_dot;
//echo "datos rut: ".$rut;
//echo "datos verificador: ".$verificador;
//if($b->resultado->num_rows>0){echo '<script type="text/javascript">
    //    alert("El usuario ya existe");
  //   </script>';
//}else{
$mysqli->query("insert into carabinero_lesionado values (Null, '$id_evento_carabinero', '$codigo_carabinero','$carabinero_lesionado','$motivo_carabinero','$parte_carabinero');");
if(isset($mysqli->mysqli_error))echo '<br>'.$mysqli->mysqli_error; 

$mensaje_evento="Carabinero lesionado guardado para el evento con ID :"." ".$id_evento_carabinero. "\\n";

echo "<script>if(confirm('$mensaje_evento')){ 
document.location='add_evento.php';} 
</script>";  




}

?>	  
	  
	  
<?php
if(isset($_POST['guardar_dano'])){
$id_evento_dano=$_POST['cbo_id_evento_danos'];
$cbo_danos_tipo=$_POST['cbo_danos_tipo'];


//require("base_i.php");
//$b=new basedatos();
//$b->query("select * from login where rut=$rut");
//echo "datos rut: ".$rut_no_dot;
//echo "datos rut: ".$rut;
//echo "datos verificador: ".$verificador;
//if($b->resultado->num_rows>0){echo '<script type="text/javascript">
    //    alert("El usuario ya existe");
  //   </script>';
//}else{
$mysqli->query("insert into danos values (Null, '$id_evento_dano', '$cbo_danos_tipo');");
if(isset($mysqli->mysqli_error))echo '<br>'.$mysqli->mysqli_error; 

$mensaje_evento="Daño guardado para el evento con ID :"." ".$id_evento_dano. "\\n";

echo "<script>if(confirm('$mensaje_evento')){ 
document.location='add_evento.php';} 
</script>";  





}

?>	 
	  