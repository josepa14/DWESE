<?php
if (isset($_GET["accion"]) && $_GET["accion"]=="nuevo")
{
    $nom = $_POST["origen"];
    $des= $_POST["destino"];
    $men= $_POST["mensaje"];

    $sql= "INSERT INTO `mensaje`( `emisor`, `receptor`, `mensaje`) VALUES ('$nom','$des','$men')";

    $con = new PDO("mysql:host=localhost;dbname=chat","root","1234");
    $con->exec($sql);
}
if (isset($_GET["accion"]) && $_GET["accion"]=="recuperar"){
    $nom = $_POST["origen"];
    $des= $_POST["destino"];
    $men= $_POST["ultimo"];

    $sql= "SELECT `emisor`, `receptor`, `mensaje` FROM `mensaje` WHERE ((emisor='$nom' and receptor='$des') and (emisor='$des' and receptor='$nom')) and id>$ultimo order by fechahora";
    $con = new PDO("mysql:host=localhost;dbname=chat","root","1234");
    $result = $con->query($sql);
    $consulta = $result->fetchAll(PDO::FETCH_ASSOC);
    echo (json_encode($consulta));
}