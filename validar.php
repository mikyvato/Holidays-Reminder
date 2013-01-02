<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//--- Validar Archivo encargado de validar usuarios para el ingreso al sistema -----
include("funciones_db.php");

$usuario = $_POST['usu'];
$clave = $_POST['pass'];

$sql = " SELECT *  "; //----Datos pertinentes al usuarui
$sql .= " FROM usuario ";
$sql .= " WHERE "; 
$sql .= " usuario.UsuUsuario = '$usuario' AND usuario.UsuPass = '$clave' AND usuario.UsuHabilitado = 1 ";

$usuario = sql_get($sql);
//---- USUARIO Existe !!!
if ($usuario){
    //-- Inicializo las variables de Session
    $_SESSION['AUTENTICADO']=1;
    $_SESSION['horainiciosesion']=time();
    $_SESSION['usuario']=$usuario['UsuUsuario'];
    
    //-- Redirecciono a la web de inicio
    header("Location: clientes.php");
}
else{
    header("Location: index.php?resultado=1&mostrar=1");
}
?>
