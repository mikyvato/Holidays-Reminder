<?php
//----- Conexion archivo encargado de conectarce a la DB --------

require ('conex_constantes.php');

// 1. Conectar a la base de datos
$link = mysql_connect(DB_SERVIDOR,DB_USUARIO,DB_PASSWORD);

if (!$link)
	{
		die ("Fallo la conexion a la base de datos 1" . mysql_error());
	}


// 2. Seleccionar la base de datos
$dbseleccionada = mysql_select_db(DB_BASEDEDATOS, $link);

if (!$dbseleccionada)
   {
		die ("Fallo la selecion de la base de datos 2" . mysql_error());   	
   }
?>