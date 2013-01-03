<?php
include 'funciones_db.php';
include 'funciones.php';

$sql = "SELECT `idFeriados` , `FeriadoFecha` , `FeriadoDias` , FeriadoNombre, idClientes, cliNombre, cliMail, idUsuarios, usuNombre ";
$sql .= " FROM feriado ";
$sql .= " LEFT JOIN cliente ON cliente.Usuarios_idUsuarios = feriado.Usuarios_idUsuarios ";
$sql .= " LEFT JOIN usuario ON feriado.Usuarios_idUsuarios = usuario.idUsuarios ";
$sql .= " WHERE feriado.FeriadoFecha = DATE_ADD( CURDATE( ) , INTERVAL 15 DAY ) ";
$sql .= " AND feriado.FerHabilitado =1 AND cliente.cliHabilitado =1 ";

$valores = sql_arreglo($sql);
if ($valores){
    echo "Datos encontrados";
foreach ($valores as $id => $valor){
    $asunto = "[Holidays Remider] - recordatorio de día no laborable";
        
    $mensaje = " <h1> Recordatorio de d&iacute;a no laborable </h1> <br>";
    $mensaje .= $valor['cliNombre'].", tenemos el agrado de comunicarno con ud a fin de informarle que el d&iacute;a ".fecha_hora_normal($valor['FeriadoFecha']);
    if ($valor['FeriadoDias'] > 1){
        $mensaje .= " comenzar&aacute; una jornada de descanso en nuestra regi&oacute;n (".$valor['FeriadoNombre'].") por lo que nuestra empresa no prestara servicios durante ".$valor['FeriadoDias']." d&iacute;as <br>";
    }
    else{
        $mensaje .= " es feriado en nuestra regi&oacute;n (".$valor['FeriadoNombre'].") por lo que nuestra empresa no prestara servicios en est&aacute; fecha <br>";
    }
    $mensaje .= " tome los recaudos necesario del caso, desde ya gracias y esperamos sepa disculpar las molestias <br><br>";
    $mensaje .= " Saluda a Ud. muy atentamente:<br>";
    $mensaje .= $valor['usuNombre']."<br><br>";
        
    $mensaje .= " <br><br>";
    $mensaje .= " <br><br>";
    $mensaje .= " En caso de no querer recibir m&aacute;s este tipo de avisos dar click <a href=\"http://holidaysreminder.6te.net/ABM_Clientes.php?idClientes=".$valor['idClientes']."&idUsuarios=".$valor['idUsuarios']."&opcion=4\">aquí</a> <br>";
    $mensaje .= " Ante cualquier problema no dudes en comunicarte con nosotros directamente desde nuestra web www.Holidays Reminder.com <br><br>";
    $mensaje .= " No conteste este email ";

    /* Para enviar correo HTML, puede definir la cabecera Content-type. */

    $cabeceras  = "MIME-Version: 1.0\r\n";
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $cabeceras .= "from: info@HolidaysRemider.com \r\n";

    if (mail($valor['cliMail'], $asunto,$mensaje,$cabeceras)){
        echo "mail enviado => $id ";
    }
    else
        echo "mail no enviado";
}
}
?>
