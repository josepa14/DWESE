<?php
function abreConex()
{
    return new PDO('mysql:host=localhost;dbname=usuarios', 'root', '1234');
}
    
function getAll()
{
    $conex=abreConex();
    $usuario=[];
    $i=0;
    $resultado = $conex->query("select * from usuarios");
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $usuario['user']=$fila['user'];
        $usuario['pass']=$fila['pass'];
        $usuario['rol']=$fila['rol'];
        $i++;
    }   
    $conex=null;
    return $usuario;
}

function getById($id)
{
    $conex=abreConex();
    $usuario = [];
    $resultado = $conex->query("select * from usuarios where id = $id");
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $usuario['user']=$fila['user'];
        $usuario['pass']=$fila['pass'];
        $usuario['rol']=$fila['rol'];
    }   
    $conex=null;
    return $usuario;
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