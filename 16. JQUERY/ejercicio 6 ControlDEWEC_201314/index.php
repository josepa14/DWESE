<?php
	session_start();
	require_once("funciones.php");
	require_once("bd.php");
	if(!isset($_SESSION["carrito"])){
		$_SESSION["carrito"]=array();
		$_SESSION["carrito"]["total"]=0;
		$_SESSION["carrito"]["productos"]=array();
	}
	
	$contenido = "";
	if(isset($_GET["accion"])){
	switch($_GET["accion"]){
		case "detalle":
			$contenido=ver_detalle_html($_GET["id"]);
			break;
		case "ver_carrito":
			$contenido=ver_carrito_html();
			break;
		case "comprar":
			comprar($_GET["id"]);
			$contenido=ver_carrito_html();
			break;
		case "disminuir":
			disminuir($_GET["id"]);
			$contenido=ver_carrito_html();
			break;
		case "eliminar":
			eliminar($_GET["id"]);
			$contenido=ver_carrito_html();
			break;	
		default:
			$contenido=ver_productos_html();
	}
	}else{
	    $contenido=ver_productos_html();
	}
	function simular_transmision($resultado){
		//desactivar la siguiente linea para no hacer espera
		//usleep(strlen($resultado)*1000);
		return $resultado;
	}
	ob_start("simular_transmision");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es"> 
	<head>
		<title>Curso de AJAX</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml" charset="utf8" />
		<link rel="stylesheet" type="text/css" href="css.css" />
		<script src="index_files/jquery.js" type="text/javascript"></script>
		<script src="index_files/jquery-ui.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" href="index_files/jquery-ui.theme.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="index_files/jquery-ui.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="index_files/jquery-ui.structure.css" type="text/css" media="screen" title="no title" charset="utf-8">
		<script type="text/javascript" src="js.js"></script>

	</head>
	<body>
		<div id="web">
			<div id="cabecera"><h1>Tienda virtual</h1></div>
			<div id="carrito">
				<h2 class="superior">Compra actual</h2>
				<div class="inferior"><span id="total_carrito"><?=sprintf("%.2f",$_SESSION["carrito"]["total"])?></span> €</div>
				<a id="ver_carrito" href="index.php?accion=ver_carrito">Ver carrito</a>
			</div>	
			<div id="cabecera2"></div>
			<?=$contenido?>
			<div id="lateral"></div>
			<div id="pie"></div>
		</div>
	</body>
</html>
<?
	ob_end_flush();
?>