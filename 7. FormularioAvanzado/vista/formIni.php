<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../controlador/procesalogin.php" method="post">
        <ul>
           <label for="nombre">Nombre:</label>
           <input type="text" name="nombre"></input>
           <?php
           if (isset($_POST['nombre'] && empty($_POST['nombre'])) ){
            echo "<h1>El campo nombre no puede estar vacio</h1>";
           }
           ?>
           <label for="pass">Pass:</label>
           <input type="pass"  name="pass"></input>
<?php
?>
           <button type="submit">Login </button>
        </ul>
       </form>   
</body>
</html>