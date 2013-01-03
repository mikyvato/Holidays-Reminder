<?php

session_start();
include 'funciones_db.php';
/*
 * Archivo encargado de realizar Altas Bajas y Modificaciones 
 * de la entidad que lleva por nombre.
 */

$opcion = $_REQUEST['opcion'];

/**
 * Opcion es 1 se realiza el alta 
 * 
 */

if ($opcion == 1){
    $CliNombre = $_POST['CliNombre'];
    $CliMail = $_POST['CliMail'];
    $CliHabilitado = 1;
    $Usuarios_idUsuarios = $_SESSION['idUsuarios'];
    $provincia_idProvincias = $_POST['idProvincias'];
    $provincia_Pais_idPais = $_POST['idPais'];
    
    $ins = " INSERT INTO cliente ";
    $ins .= " (`CliNombre`, `CliMail`, `CliHabilitado`, `Usuarios_idUsuarios`, `provincia_idProvincias`, `provincia_Pais_idPais`) ";
    $ins .= " VALUE ";
    $ins .= " ('$CliNombre', '$CliMail', $CliHabilitado, $Usuarios_idUsuarios, $provincia_idProvincias, $provincia_Pais_idPais) ";
    
    sql_INS($ins);
    
    header("Location: clientes.php?atajo=1&resultado=2&mostrar=10");
}

if ($opcion == 2){
    
    $idClientes = $_POST['idClientes'];
    $CliNombre = $_POST['CliNombre'];
    $CliMail = $_POST['CliMail'];
    $provincia_idProvincias = $_POST['idProvincias'];
    $provincia_Pais_idPais = $_POST['idPais'];
    
    $upd = " UPDATE cliente SET ";
    $upd .= " CliNombre = '$CliNombre', ";
    $upd .= " CliMail = '$CliMail', ";
    $upd .= " provincia_idProvincias = $provincia_idProvincias, ";
    $upd .= " provincia_Pais_idPais = $provincia_Pais_idPais ";
    $upd .= " WHERE ";
    $upd .= " idClientes = $idClientes ";
    
    sql_INS($upd);
    
    header("Location: clientes.php?atajo=1&resultado=2&mostrar=10");
}

if ($opcion == 3){
    
    $idClientes = $_GET['idClientes'];
    $estado = $_GET['estado'];
    
    $upd = " UPDATE cliente SET ";
    $upd .= " CliHabilitado = $estado ";
    $upd .= " WHERE ";
    $upd .= " idClientes = $idClientes ";
    
    sql_INS($upd);
    
    header("Location: clientes.php?atajo=1&resultado=4&mostrar=2$estado");
    
}

if ($opcion == 4){
    $idUsuarios = $_GET['idUsuarios'];
    $idClientes = $_GET['idClientes'];
    
    $estado = 0;
    
    $upd = " UPDATE cliente SET ";
    $upd .= " CliHabilitado = $estado ";
    $upd .= " WHERE ";
    $upd .= " idClientes = $idClientes ";
    
    sql_INS($upd);
    
    $sql = " SELECT * FROM usuario ";
    $sql .= " LEFT JOIN cliente on cliente.Usuarios_idUsuarios = usuario.idUsuarios ";
    $sql .= " WHERE usuario.idUsuarios = $idUsuarios AND cliente.idClientes=$idClientes ";
    $usu = sql_get($sql);
    
    $asunto = "[Holidays Remider] - Aviso Baja de Servicio";

        $mensaje = " <h1> Baja del Servicio </h1> <br>";
        $mensaje .= $usu['UsuNombre'].", le comunicamos que el cliente \"".$usu['CliNombre']."\" pidio no recibir mas notifiaciones desde nuestro servico. <br>";
        $mensaje .= " Quedando ud debidamente notificado <br>";
        $mensaje .= " <br><br>";
        $mensaje .= " <br><br>";
        $mensaje .= " Ante cualquier problema no dudes en comunicarte con nosotros directamente desde nuestra web www.Holidays Reminder.com <br><br>";
        $mensaje .= " No conteste este email ";

        /* Para enviar correo HTML, puede definir la cabecera Content-type. */

        $cabeceras  = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $cabeceras .= "from: Holidays Remider \r\n";

        mail($usu['UsuMail'], $asunto,$mensaje,$cabeceras);
    
    header("Location: index.php?resultado=4&mostrar=10");
}
?>
