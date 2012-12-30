<?php
/**
 

//--- Variables para Importacion de Archivos --/
$totEquiposIns = (isset($_GET['totEquipoIns'])) ? $_GET['totEquipoIns'] : 0;
$duplicado = (isset($_GET['duplicado'])) ? $_GET['duplicado'] : 0;
$error = (isset($_GET['error'])) ? $_GET['error'] : 0;*/

$mostrar = array('1'=>'ERROR Usuario o Password no coinciden. Si olvido la contrase&ntilde;a puede recuperarla haciendo click <a href="recuperar.php"> aqu&iacute; </a>',
    '2'=>'El email utilizado ya existe, si desea recuperar la contraseña haga click <a href="recuperar.php"> aqu&iacute; </a>',
    '3'=>'El email utilizado no existe, verifique los datos ingresados'
    );

?>
