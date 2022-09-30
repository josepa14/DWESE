<?php
echo "<img src='data:image/jpeg;$_COOKIE[imagen]'/>";
//echo "<h1>Hola $_COOKIE[nombre] $_COOKIE[apellido]</h1></br>";
echo "<br>";
var_dump($_GET['b']);
echo "<br>";
var_dump($_GET['c']);

$a = $_GET['b'];
$b = $_GET['c'];




if ($_GET['a'] === 'suma'){
    $c = $a+$b;
    echo "<h1> la suma da: $c </h1>";
  
}elseif($_GET['a'] === 'resta'){
    $c = $a-$b;
    echo "<h1> la resta da: $c </h1>";
    
}elseif($_GET['a'] === 'multiplicar'){
    $c = $a*$b;
    echo "<h1> la multiplicacion da: $c </h1>";
    
}elseif($_GET['a'] === 'dividir'){
    $c = $a/$b;
    echo "<h1> la division da: $c </h1>";
    
}

?>