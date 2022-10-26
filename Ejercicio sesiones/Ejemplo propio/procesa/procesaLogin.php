<?php
function abreConex(){
    try {
        $con = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '1234');
        
        $con->exec("set names utf8");
    } catch (PDOException $e) { //Se capturan los mensajes de error
        die("Error: " . $e->getMessage()); 
    }
    return $con;
}
function getRolbyUser($usuario)
{
    $conex=abreConex();
    $rol = $conex->query("select rol from usuarios where user = $usuario");   
    $conex=null;
    return $rol;
}


if (isset($_POST['enviar'])) {
  
    $usuario = $_POST['usuario'];
    $password = $_POST['password']; 

    //Si el usuario o la contraseña esta vacío, mandamos un mensaje
    if (empty($usuario) || empty($password)) {
        $error = "Debes introducir un nombre de usuario y una contraseña";
    } else {
        $sql = "SELECT user FROM usuarios WHERE user=:user1 AND pass=:pass1";
        $con = abreConex();
        $resultado = $con->prepare($sql);
        $resultado->bindParam(":user1", $usuario);
        $resultado->bindparam(":pass1", $password);
        $resultado->execute();
        $fila = $resultado->fetch();
        
        if ($fila != null) {
            session_start();
            $rol = getRolbyUser($usuario);
            $_SESSION['rol']=$rol;
            $_SESSION['user']=$usuario;
            //Redireccionamos a la página que nos interesa
           // header("Location: ../vista/listado.php");      
           echo $rol;              
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Usuario o contraseña no válidos!";
            echo $error;
        }
        unset($resultado);
        unset($dwes);    
    }
}
?>