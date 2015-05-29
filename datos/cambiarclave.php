<?php

function cambiarclave()
{
	$respuesta = false;
	$usuario   = "'".$_POST["usuario"]."'";
	$nombre    = "'".$_POST["nombre"]."'";
	$clave = "'".$_POST["clave"]."'";
	$conexion  = mysql_connect("localhost","root","");
	mysql_select_db("pw10am");
	$consulta  = sprintf("update usuarios set clave=%s, where usuario=%s",$clave,$usuario);
	$resultado = mysql_query($consulta);
	if(mysql_affected_rows()>0)
		$respuesta = true;
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}

$opcion = $_POST["opcion"];
switch ($opcion) {
	case 'cambiarclave':
		cambiarclave();
		break;
	
	default:
		# code...
		break;
}
?>