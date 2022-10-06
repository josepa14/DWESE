<?php

echo "<h1>hola</h1>";

$nombre=$_FILES['fichero_usuario']['name'];

$fichero=$_FILES['fichero_usuario'];

var_dump($fichero);
var_dump($nombre);

$ruta= $_SERVER['DOCUMENT_ROOT'];
var_dump($ruta);

//probar ruta con $documentroot


$dir_subida = 'C:\xampp\htdocs\training\formularioFile\imagenes\\';

$fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";





?>