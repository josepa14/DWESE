<?php
	$productos=array();
	$productos[1] ="Frutero                | 15.50 | Frutero metálico con las últimas tendencias en diseño. Puede albergar cuatro piezas de fruta.";
	$productos[2] ="Jarra de café          | 18.50 | Jarra de café metálica con las últimas tendencias en diseño. Puede albergar medio litro de café.";
	$productos[3] ="Tabla para cortar      | 19.00 | Tabla de madera con acabados representativos. Corte queso de forma cómoda y sin estropear su mesa.";
	$productos[4] ="Salvamanteles          |  7.80 | No manche ninguna superficie usando nuestro salvamanteles.";
	$productos[5] ="Plato                  |  5.20 | Plato profundo para sopa, también puede usarse para adornar en su cocina.";
	$productos[6] ="Cuenco aperitivos      |  4.50 | Sorprenda a sus invitados con este fabuloso cuenco para aperitivos, con dos zonas diferenciadas.";
	$productos[7] ="Azucarero              |  2.90 | Azucarero en forma de pimiento verde. Sorprenderá a sus visitas con este curioso azucarero.";
	$productos[8] ="Salero                 |  3.40 | Salero en forma de calabaza. Sorprenderá a sus visitas con este curioso salero.";
	$productos[9] ="Fuente pequeña         | 15.00 | Fuente para postre unipersonal. Haga sus postres y presentelos de forma única.";
	$productos[10]="Fuente grande          | 25.90 | Fuente grande para multitud de comidas. Ya puede hacer grandes cenas gracias a su capacidad.";
	
	for($i=1;$i<=count($productos);$i++){
		$items = explode('|',$productos[$i]);
		$productos[$i]=array();
		$productos[$i]["id"] = $i;
		$productos[$i]["nombre"]=trim($items[0]);
		$productos[$i]["precio"]=trim($items[1]);
		$productos[$i]["descripcion"]=trim($items[2]);
	}
?>