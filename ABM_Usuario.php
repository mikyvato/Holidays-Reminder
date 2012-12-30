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
if ($opcion==1){
    
   $usuNombre = $_POST['usuNombre'];
   $idPais = $_POST['idPais'];
   $idProvincias = $_POST['idProvincias'];
   $usuMail = $_POST['usuMail'];
   $usuUsuario = $_POST['usuUsuario'];
   $usuPass = $_POST['usuPass'];
    
   $sql = " SELECT * FROM usuario WHERE UsuMail='$usuMail' ";
   $num = sql_num($sql);
   
   if ($num==0){
       $ins = " INSERT INTO usuario ";
        $ins.= "(`UsuNombre`, `UsuUsuario`, `UsuPass`, `UsuMail`, `Provincias_idProvincias`, `Provincias_Pais_idPais`)";
        $ins.= " VALUES ";
        $ins.= "('$usuNombre', '$usuUsuario', '$usuPass', '$usuMail', '$idProvincias', '$idPais')";

        sql_INS($ins);

        $idUsuarios = mysql_insert_id();

        $asunto = "[Holidays Remider] - Confirmación de Mail";

        $mensaje = " <h1> Confirmación de mail </h1> <br><br>";
        $mensaje .= " $usuNombre, te damos la bienvenida y agradecemos tu confianza, ya estas a un solo paso de poder usar nuestro servicio. <br>";
        $mensaje .= " Para poder activar tu cuenta te pedimos que des un click <a href=\"ABM_Usuario.php?idUsuarios=$idUsuarios?opcion=2\">aquí</a> <br>";
        $mensaje .= " <br><br>";
        $mensaje .= " <br><br>";
        $mensaje .= " <br><br>";
        $mensaje .= " Ante cualquier problema no dudes en comunicarte con nosotros directamente desde nuestra web www.Holidays Reminder.com <br><br><br>";
        $mensaje .= " No conteste este email ";

        /* Para enviar correo HTML, puede definir la cabecera Content-type. */

        $cabeceras  = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $cabeceras .= "from: Holidays Remider \r\n";

        mail($usuMail, $asunto,$mensaje,$cabeceras);
        
       header("Location: gracias.php");
   }
   else{
       header("Location: nuevoUsuario.php?resultado=1&mostrar=2");
   }
        
}

if ($opcion==2){
    $idUsuarios=$_GET['idUsuarios'];
    
    $upd = " UPDATE usuario SET ";
    $upd .= " UsuHabilitado = 1 ";
    $upd .= " WHERE ";
    $upd .= " idUsuarios = $idUsuarios ";
    
    sql_INS($upd);
    
    header("Location: gracias.php?opcion=2");
            
}

if ($opcion == 3){
    $usuMail = $_POST['usuMail'];
    $sql = " SELECT * FROM usuario WHERE UsuMail='$usuMail' ";
    $usu = sql_get($sql);
   
    if ($usu){
        
    }
    else{
        header("Location: recuperar.php?resultado=1&mostrar=3");
    }
}
?>
