<?php


define("host_local","168.88.13.62");
define("user_local","fcop2019");
define("pass_local","fcop2019");
define("bd_local","DB_Fcop");

//define("host_local","192.168.56.101");
//define("user_local","root");
//define("pass_local","0000");
//define("bd_local","db_mensajeria_os1_v2");
/*
define("host_local","168.88.6.109");
define("user_local","admin");
define("pass_local","0000");
define("bd_local","DB_mensajeria_os1_v2");
*/





//Inicio la sesión
session_start();

//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if($_SESSION["autenticado"] != "SI"){
	//si no existe, va a la página de autenticacion
	//header("Location: ../../index.html");
	//salimos de este script
	//exit();
}
 





function conecta()
{	
	$jsondata = array();
	
	$conexion = mysqli_connect(host_local,user_local,pass_local,bd_local);
	
    if(mysqli_connect_errno())
    {
		try{
			throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_local." ", mysqli_connect_errno());
        }
        catch(Exception $e)
        {
			$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));
			echo json_encode($jsondata);
			exit;
		}
    }
    else
    {
		return $conexion;
	}	
}



/*
function conecta(){
	
	try{
		$conexion = mysqli_connect(host_local,user_local,pass_local,bd_local);
		return $conexion;
	}catch(Exception $e){
		throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_personal." ", mysqli_connect_errno());		
		
		$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));		
		echo json_encode($jsondata);
		exit;
	}

}
*/




/*
define("host_personal","168.88.11.21");
define("user_personal","mensajeriaos1");
define("pass_personal","os12017");
define("bd_personal","DB_Personal");
*/

/*
define("host_personal","localhost");
define("user_personal","root");
define("pass_personal","0000");
define("bd_personal","db_personal");


function conectadbpersonal()
{	
	$conexion = mysqli_connect(host_personal,user_personal,pass_personal,bd_personal);	
	$jsondata = array();

    if(mysqli_connect_errno())
    {
        try
        {
			throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_personal." ", mysqli_connect_errno());
        }
        catch(Exception $e)
        {
			$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));
			echo json_encode($jsondata);
			exit;
		}
    }
    else
    {
		return $conexion;
	}
}




define("host_reparticiones","168.88.11.26");
define("user_reparticines","finostroza");
define("pass_reparticiones","finostroza");
define("bd_reparticiones","DB_Reparticiones");


function conectadbreparticiones()
{	
	$conexion = mysqli_connect(host_reparticiones,user_reparticines,pass_reparticiones,bd_reparticiones);	
	$jsondata = array();

    if(mysqli_connect_errno())
    {
        try
        {
			throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_reparticiones." ", mysqli_connect_errno());
        }
        catch(Exception $e)
        {
			$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));
			echo json_encode($jsondata);
			exit;
		}
    }
    else
    {
		return $conexion;
	}
}


define("host_aupol","168.88.13.110");
define("user_aupol","npoliciales");
define("pass_aupol","npoliciales231");
define("bd_aupol","aupol");


function conectadbaupol()
{	
	$conexion = mysqli_connect(host_aupol,user_aupol,pass_aupol,bd_aupol);	
	$jsondata = array();

    if(mysqli_connect_errno())
    {
        try
        {
			throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_reparticiones." ", mysqli_connect_errno());
        }
        catch(Exception $e)
        {
			$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));
			echo json_encode($jsondata);
			exit;
		}
    }
    else
    {
		return $conexion;
	}
}




/*define("host_carnew","168.88.11.3");
define("user_carnew","rmedina");	
define("pass_carnew","rmedina");
define("bd_carnew","CAR_NEW");*/

/*
function conectadbcarnew(){			    
	$conexion = mysqli_connect(host_carnew,user_carnew,pass_carnew,bd_carnew);
	
	$jsondata = array();

	if(mysqli_connect_errno()){
		try{
			throw new Exception("MySQL ERROR : ".mysqli_connect_error()."Servidor IP: ".host_carnew." ", mysqli_connect_errno());
		}catch(Exception $e){			
			$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage() . 'Error Nro:' . utf8_encode($e->getCode())));
			echo json_encode($jsondata);
			exit;
		}
	}else{
		return $conexion;
	}
	
}
*/










function ejecutaSQL_select($con, $sql)
{
	if($con == 'conecta'){$coneccion=conecta();}
	//if($con == 'personal'){$coneccion=conectadbpersonal();}
    //if($con == 'reparticiones'){$coneccion=conectadbreparticiones();}		
    //if($con == 'participantes'){$coneccion=conectadbaupol();}
	
	$jsondata = array();
	
    try
    {   
        mysqli_set_charset($coneccion, "utf8");
		$Result = mysqli_query($coneccion,$sql);
        if($Result)
        {
			return($Result);
        }
        else
        {
			throw new Exception("MySQL ERROR : " . mysqli_error($coneccion));
		}
		
		//mysqli_free_result($Result);
		//mysqli_close($con);
		
    }
    catch(Exception $e)
    {
	 	$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage()));
		echo json_encode($jsondata);
		exit;
	}		
	
}



function ejecutaSQL_insert($con, $sql)
{
	if($con == 'conecta'){$coneccion=conecta();}
	//if($con == 'personal'){$coneccion=conectadbpersonal();}
    //if($con == 'reparticiones'){$coneccion=conectadbreparticiones();}	
	
	$jsondata = array();
	
    try
    {
		$Result = mysqli_query($coneccion,$sql);
        if($Result)
        {
            if(mysqli_affected_rows($coneccion)==1)
            {	
				$sql = "SELECT @id";
				$Result = mysqli_query($coneccion,$sql);				 				  
				return($Result);
            }
            else
            {
				return(0);
			}			
        }
        else
        {
			throw new Exception("MySQL ERROR : " . mysqli_error($coneccion));
		}
		
		//mysqli_free_result($Result);
		//mysqli_close($con);	
    }
    catch(Exception $e)
    {
	 	$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage()));
		echo json_encode($jsondata);
		exit;
	}		
	
}

/*
function ejecutaSQL_insert2($con, $sql)
{
	if($con == 'novedadespoliciales'){$coneccion=conecta();}
	if($con == 'personal'){$coneccion=conectadbpersonal();}
	if($con == 'reparticiones'){$coneccion=conectadbreparticiones();}	
	
	$jsondata = array();
	
    try
    {
		$Result = mysqli_query($coneccion,$sql);
        if($Result)
        {
            if(mysqli_affected_rows($coneccion)==1)
            {	
				 $last_id = mysqli_insert_id($coneccion);
				 $Result = $last_id;	 
				 return($Result);
            }
            else
            {
				return(0);
			}			
        }
        else
        {
			throw new Exception("MySQL ERROR : " . mysqli_error($coneccion));
		}
		
		//mysqli_free_result($Result);
		//mysqli_close($con);	
    }
    catch(Exception $e)
    {
	 	$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage()));
		echo json_encode($jsondata);
		exit;
	}		
	
}

*/


function ejecutaSQL_update($con, $sql)
{
	if($con == 'novedadespoliciales'){$coneccion=conecta();}
	if($con == 'personal'){$coneccion=conectadbpersonal();}
	if($con == 'reparticiones'){$coneccion=conectadbreparticiones();}	
	
	$jsondata = array();	
    try
    {
        $Result = mysqli_query($coneccion,$sql);
        
        if($Result)
        {
            if(mysqli_affected_rows($coneccion)==1)
            {
				return(1);
            }
            else
            {
				return(0);
			}			
        }
        else
        {
			throw new Exception("MySQL ERROR : " . mysqli_error($coneccion));
		}
		
		//mysqli_free_result($Result);
		//mysqli_close($con);
		
    }
    catch(Exception $e)
    {
	 	$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage()));
		echo json_encode($jsondata);
		exit;
    }	
}

function ejecutaSQL_bitacora($con, $sql, $ip, $rut_usuario, $etapa_evento_bitacora, $procedimiento)
{
	if($con == 'novedadespoliciales'){$coneccion=conecta();}
	if($con == 'personal'){$coneccion=conectadbpersonal();}
	if($con == 'reparticiones'){$coneccion=conectadbreparticiones();}	
	
	$jsondata = array();
	
    try
    {
		$sqlBitacora = "INSERT INTO ta_bitacora(rut_usuario_bitacora
												,date_time_bitacora
												,evento_etapa_bitacora
												,descripcion_bitacora
												,sql_bitacora
												,ips_acceso_bitacora
												,marca_bitacora
												,estado_bitacora
												,id_centro_operacion)
						VALUES ('".$rut_usuario."'
								,NOW()
								,'".$etapa_evento_bitacora."'
								,'".$procedimiento."'
								,\"$sql\"
								,'".$ip."'
								,NULL
								,1
								,".$_SESSION['id_centro_operacion'].")";
		
		
		$Result = mysqli_query($coneccion,$sqlBitacora);
        if($Result)
        {
            if(mysqli_affected_rows($coneccion)==1)
            {
				return(1);
            }
            else
            {
				return(0);
			}			
        }
        else
        {
			throw new Exception("MySQL ERROR : " . mysqli_error($coneccion));
		}
		
		//mysqli_free_result($Result);
		//mysqli_close($con);
		
    }
    catch(Exception $e)
    {
	 	$jsondata = array('tipo' => 'error', 'mensaje' => utf8_encode($e->getMessage()));
		echo json_encode($jsondata);
		exit;
	}		
}

?>
