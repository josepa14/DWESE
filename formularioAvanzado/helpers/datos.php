<?php




function llamadaFichero(){
    $fichero = "../modelo/usuarios.txt";
    $leerFichero= file_get_contents($fichero);
    $ficheroPorLineas= explode("\n",$leerFichero);
    return $ficheroPorLineas;
}

function leerFichero(){
foreach(llamadaFichero() as $v)
{
     $asoc[] = explode (";",$v);   
}
return $asoc;
}


function autenticarUser($nombre,$pass){
    $array= leerFichero();
    for($i =0; $i< count($array);$i++){
        if($array[$i][0] == $nombre && $array[$i][1]== $pass){
            if($array[$i][2]=== "true"){
                return "true";
            }
            else{
               return "false";
            }
    }
    }
}
?>