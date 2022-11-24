<?php
 echo "<h1>Recuperando datos</h1><br/>\n"; 
 $headers = apache_request_headers();
    foreach ($headers as $header => $value){
        echo "$header: $value <br/>\n";
    }
$pass = $_GET['pass'];
$user = $_GET['user'];
echo "<h1> procesando acceso</h1>";
  //  if(isset($headers['pass']) && $headers['pass'] === "1234"){
    if(isset($_GET['pass']) && $_GET['pass'] == "1234"){
        //header("Usuario: $_GET['user]");
        echo "<h1>Hola $user</h1>";
    header('Location: '."/training/principal.php?$headers[user]");
    }
else{
    echo"<h2>no tiene acceso</h2>";
}
    ?>