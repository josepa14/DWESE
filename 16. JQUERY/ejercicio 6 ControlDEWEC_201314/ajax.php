<?php
	header('Content-Type: text/plain; charset=ISO-8859-1');
	session_start();
	require_once("funciones.php");
	require_once("bd.php");
	if(!isset($_SESSION["carrito"])){
		$_SESSION["carrito"]=array();
		$_SESSION["carrito"]["total"]=0;
		$_SESSION["carrito"]["productos"]=array();
	}
	
	$contenido = "";
	switch($_GET["accion"]){
		case "ver_carrito":
			$contenido=ver_carrito_json();
			break;
		case "comprar":
			comprar($_GET["id"]);
			$contenido = "ok";
			break;
		case "disminuir":
			disminuir($_GET["id"]);
			$contenido = "ok";
			break;
		case "eliminar":
			eliminar($_GET["id"]);
			$contenido = "ok";
			break;	
		case "detalle":
			$contenido=json_encode($productos[$_GET["id"]]);
			break;
		default:
			$contenido=ver_productos_json();
	}
	
	function simular_transmision($resultado){
		//desactivar la siguiente linea para no hacer espera
		usleep(strlen($resultado)*1000);
		return $resultado;
	}
	ob_start("simular_transmision");	
	echo $contenido;
	ob_end_flush();
?>