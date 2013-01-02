<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<LINK REL="Shortcut Icon" HREF="img/03.png">
<title>Gesti&oacute;n de Usuarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <?php
    include 'botonera.php';
    ?>
    <!-------------------Encabezado------------------>
    <div class="row-fluid">
        <p><div><br>&nbsp;<br></div></p>
        <!--p><div><br>&nbsp;<br></div></p-->
        <?php
        include 'funciones_db.php';
        include 'mensajes_constantes.php';
        include 'mensajes.php';
                
        ?>
    </div>
    <div class="page-header" align="center">
        <p>
        <h1>Nuevo Cliente</h1>
        </p>
    </div>
    <div class="row-fluid">
        <blockquote>
            <span class="label label-info"> <i class="icon-info-sign icon-white"></i> Importante </span>
            <p> Aqu&iacute; udsted podr&aacute; crear sus clientes. </p>
            <small> Recuerde cargar los datos correctos para un mejor servicio. </small>            
        </blockquote>
    </div>
    
</body>
</html>
