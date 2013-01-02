<?php
session_start();

//include("funciones_db.php");

global $_SESSION;
unset($_SESSION['AUTENTICADO']);
unset($_SESSION['usuario']);
unset($_SESSION['horainiciosesion']);

session_destroy();

header("location: index.php");
?>
