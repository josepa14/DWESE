<?php
if (!Login::UsuarioEstaLogueado()){
    header("location:?menu=login");
}