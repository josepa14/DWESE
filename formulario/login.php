<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="procesa.php" method="post">
 <ul>
 
    <label for="name">Nombre:</label>
    <input type="text" name="nombre">
    <label for="modulos[]">Pass:</label>
    <input type="checkbox"  name="modulos[]" value="DWEC"></input>
    <input type="checkbox"  name="modulos[]" value="DWES"></input>
    <button type="submit">Mandar </button>
 </ul>
</form>

    
</body>
</html>