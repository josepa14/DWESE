<?php
function abreConex()
{
    return new PDO('mysql:host=192.168.121.85;dbname=prueba', 'root', '1234');
}
    
function getAll()
{
    $conex=abreConex();
    $productos=[];
    $i=0;
    $resultado = $conex->query("select * from producto");
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $productos[$i]['id']=$fila['id'];
        $productos[$i]['nombre']=$fila['nombre'];
        $productos[$i]['img']=$fila['img'];
        $i++;
    }   
    $conex=null;
    return $productos;
}

function getById($id)
{
    $conex=abreConex();
    $producto=[];
    $resultado = $conex->query("select * from producto where id = $id");
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $productos['id']=$fila['id'];
        $productos['nombre']=$fila['nombre'];
        $productos['img']=$fila['img'];
    }   
    $conex=null;
    return $productos;
}

function deleteById($id)
{
    $conex=abreConex();
    $resultado = $conex->query("delete from producto where id = $id");
    $conex=null;
}


function newAlum($datos)
{
    $conex=abreConex();
    $resultado = $conex->exec("insert into producto(nombre,img) values ('".$datos['nombre']."','".$datos['img']."')");
        
    $conex=null;
}
?>
