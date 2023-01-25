<?php
function ver_productos_html(){
	global $productos;
	$contenido='
		<h2 class="titulo_zona">Productos de cocina</h2>
		<div class="cuerpo">';
	for($i=1;$i<=count($productos);$i++){
		$actual=($i<10)?"0".$i:$i;
		$contenido.='	
			<div class="producto" id="producto_'.$i.'">
				<h3>'.$productos[$i]["nombre"].'</h3>
				<div class="info">
					<div class="titulo_precio">Precio:</div>
					<div class="precio">'.sprintf("%.2f",$productos[$i]["precio"]).' €</div>
					<a href="index.php?accion=detalle&id='.$i.'" id="detalles_'.$i.'">Detalles</a><br/>
					<a href="index.php?accion=comprar&id='.$i.'" id="comprar_'.$i.'">Comprar</a>
				</div>
				<div class="foto"><img id="imagen_'.$i.'" src="index_files/'.$actual.'coc.jpg"/></div>
			</div>';
	}
	$contenido.='	</div>	';
	return $contenido;
}

function ver_detalle_html($id){
	global $productos;
	$actual=($id<10)?"0".$id:$id;
	$contenido='
		<h2 class="titulo_zona">'.$productos[$id]["nombre"].'</h2>
		<div class="cuerpo">
			<div class="producto_detalle" id="producto_'.$id.'">
				<div class="info">
					<div class="titulo_precio">Precio:</div>
					<div class="precio">'.sprintf("%.2f",$productos[$id]["precio"]).' €</div>
					<a href="index.php?accion=comprar&id='.$id.'">Comprar</a>
					<p>'.$productos[$id]["descripcion"].'</p>
				</div>
				<div class="foto"><img src="index_files/'.$actual.'coc.jpg"/></div>
			</div>
			<div class="volver"><a href="index.php">Volver</a></div>
		</div>	';
	return $contenido;
}


function ver_carrito_html(){
	global $productos;
	$contenido='
		<h2 class="titulo_zona">Carrito de la compra</h2>
		<div class="cuerpo">';
	foreach($_SESSION["carrito"]["productos"] as $i=>$value){
		$actual=($i<10)?"0".$i:$i;
		$contenido.='	
			<div class="producto_detalle" id="producto_'.$i.'">
				<h3>'.$productos[$i]["nombre"].'</h3>
				<div class="info">
					<div class="resumen">
						<div class="titulo_precio">Precio:</div>
						<div class="precio">'.sprintf("%.2f",$productos[$i]["precio"]).' €</div>
					</div>
					<div class="resumen">
						<div class="titulo_precio">Cantidad:</div>
						<div class="precio">'.$value.' unidades</div>
					</div>
					<div class="resumen">
						<div class="titulo_precio">Total:</div>
						
						<div class="precio">'.sprintf("%.2f",($productos[$i]["precio"]*$value)).' €</div>
					</div>
					<div class="enlaces">
						<a href="index.php?accion=eliminar&id='.$i.'">Quitar del carrito</a>
						<a href="index.php?accion=comprar&id='.$i.'">Aumentar cantidad</a>
						<a href="index.php?accion=disminuir&id='.$i.'">Disminuir cantidad</a>
					</div>
				</div>
				<div class="foto"><img src="index_files/'.$actual.'coc.jpg"/></div>
			</div>';
	}
	$contenido.='<div class="producto_detalle">
				<h3 id="total">Total del carrito: '.sprintf("%.2f",$_SESSION["carrito"]["total"]).' Ä</h3>
			</div>';
	$contenido.='	<div class="volver"><a href="index.php">Volver</a></div></div>	';
	return $contenido;
}

function ver_productos_json(){
	global $productos;	
	return json_encode($productos);
}

function ver_carrito_json(){
	global $productos;
	$carrito = array();
	$carrito["productos"] = array();
	
	foreach($_SESSION["carrito"]["productos"] as $i=>$value){
		$carrito["productos"][] = array("id"=>$i, "cantidad"=>$value, "precio"=>sprintf("%.2f",($productos[$i]["precio"]*$value)));		
	}
	$carrito["total"] = sprintf("%.2f",$_SESSION["carrito"]["total"]);
	
	return json_encode($carrito);
}

function comprar($id){
	global $productos;
	if(isset($productos[$id])){
		if(isset($_SESSION["carrito"]["productos"][$id])){
			$_SESSION["carrito"]["productos"][$id]++;
		}else{
			$_SESSION["carrito"]["productos"][$id]=1;
		}
		$_SESSION["carrito"]["total"]+=$productos[$id]["precio"];
	}
}
function disminuir($id){
	global $productos;
	if(isset($_SESSION["carrito"]["productos"][$id])){
		$_SESSION["carrito"]["productos"][$id]--;
		$_SESSION["carrito"]["total"]-=$productos[$id]["precio"];
		if($_SESSION["carrito"]["productos"][$id]==0)
			unset($_SESSION["carrito"]["productos"][$id]);
	}	
}
function eliminar($id){
	global $productos;
	if(isset($_SESSION["carrito"]["productos"][$id])){
		$_SESSION["carrito"]["total"]-=$productos[$id]["precio"]*$_SESSION["carrito"]["productos"][$id];
		unset($_SESSION["carrito"]["productos"][$id]);
	}
	
}
?>