<?php
Sesion::iniciar();
setcookie('recuerdame',Sesion::leer('login'),time()-10);
Sesion::eliminar('login');
header("location:?menu=inicio");
?>