<?php
include '../helpers/datos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styles/css.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <h1>Hola admin</h1>
<table class="demo">
	<thead>
	<tr>
		<th>user</th>
		<th>pass</th>
		<th>Admin</th>
	</tr>
	</thead>
	<tbody>
    <tr>
        <?php
    $fichero= explode("\n",llamadaFichero());
    $i = 0;
    foreach($fichero as $v)
    {
         $asoc[] = explode (";",$v);

         echo "<td>".$asoc[$i][0]."</td>";
         echo "<td>&nbsp;".$asoc[$i][1]."</td>";
         echo "<td>&nbsp;".$asoc[$i][2]."</td></tr>";
         $i++;
    }  
	   echo"</tbody></table>";
    
       ?>
<h3>Agregar usuarios</h3>
<form action="../controlador/addUser.php" method="post">
 <ul>
 
    <label for="name">Nombre:</label>
    <input type="text" name="nombre">
    <label for="pass">pass:</label>
    <input type="text" name="pass">
    <label for="admin">Usuaio Admin?:</label>
    <input type="checkbox"  name="admin" value="true"></input>
    <button type="submit">Mandar </button>
 </ul>
</form>
       <?php


        ?>
</body>
</html>