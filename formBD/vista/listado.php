<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
</head>

<?php

require_once "./../modelo/BD.php";

$listaProductos=getAll();


echo "<table border=1px>";
    
for($i=0;$i<count($listaProductos);$i++){
    echo "<tr><td> ".$listaProductos[$i]["id"]."</td><td> ".$listaProductos[$i]["nombre"]."</td><td> "."<img src='data:image/png;base64," .$listaProductos[$i]["img"]."'>"."</td><td>"."<a href='./borra.php?id=".$listaProductos[$i]["id"]."'>❌</a>"."</td><td>"."<a href='./edita.php?id=".$listaProductos[$i]["id"]."'>✐</a>"."</td></tr>";
}

echo "</table>";

?>

<body>
        <form name="input" method="post" action="./nuevo.php">
            <input type="submit" id="nuevo" value="Nuevo Producto">  
        </form>        
</body>
</html>

