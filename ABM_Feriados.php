<?php
session_start();
include 'funciones_db.php';
include 'funciones.php';
/*
 * Archivo encargado de realizar Altas Bajas y Modificaciones 
 * de la entidad que lleva por nombre.
 */

$opcion = $_REQUEST['opcion'];

if ($opcion==1){
    $FeriadoFecha = $_POST['FeriadoFecha'];
    $FeriadoFecha = fecha_hora($FeriadoFecha);
    $FeriadoDias = $_POST['FeriadoDias'];
    $FeriadoNombre = $_POST['FeriadoNombre'];
    $Usuarios_idUsuarios = $_SESSION['idUsuarios'];
    
    $ins = " INSERT INTO feriado ";
    $ins .= " (`FeriadoFecha`, `FeriadoDias`, `FerHabilitado`, `Usuarios_idUsuarios`, `FeriadoNombre`) ";
    $ins .= " VALUES ";
    $ins .= " ('$FeriadoFecha', $FeriadoDias, 1, $Usuarios_idUsuarios, '$FeriadoNombre') ";
    
    sql_INS($ins);
    
    header("Location: feriados.php?atajo=2&resultado=2&mostrar=10");
}

if ($opcion == 2){
    $idFeriados = $_POST['idFeriados'];
    $FeriadoFecha = $_POST['FeriadoFecha'];
    $FeriadoFecha = fecha_hora($FeriadoFecha);
    $FeriadoDias = $_POST['FeriadoDias'];
    $FeriadoNombre = $_POST['FeriadoNombre']; 
    
    $upd = " UPDATE feriado SET ";
    $upd .= " FeriadoFecha = '$FeriadoFecha', ";
    $upd .= " FeriadoDias = '$FeriadoDias', ";
    $upd .= " FeriadoNombre = '$FeriadoNombre' ";
    $upd .= " WHERE ";
    $upd .= " idFeriados = $idFeriados ";
    
    sql_INS($upd);
    
    header("Location: feriados.php?atajo=2&resultado=2&mostrar=10");
}

if ($opcion == 3){
    
    $idFeriados = $_GET['idFeriados'];
    $estado = $_GET['estado'];
    
    $upd = " UPDATE feriado SET ";
    $upd .= " FerHabilitado = $estado ";
    $upd .= " WHERE ";
    $upd .= " idFeriados = $idFeriados ";
    
    sql_INS($upd);
    
    header("Location: feriados.php?atajo=1&resultado=4&mostrar=2$estado");
    
}
?>
