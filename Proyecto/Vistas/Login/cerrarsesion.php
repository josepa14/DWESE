<?php
setcookie('recuerdame',Sesion::leer('user')->getLogin(),time()-10);
Sesion::eliminar('user');
header("location:?menu=inicio");
?>