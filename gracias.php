<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link type="text/css" rel="Stylesheet" href="js/validity/estilo2.css" >
<LINK REL="Shortcut Icon" HREF="img/03.png">
<title>-- Holidays Remider --</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <div class="container-fluid">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <!--div class="container"-->

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <!-- Be sure to leave the brand out there if you want it shown -->
            
                <a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Holidays Reminder&nbsp;&nbsp;</a>

                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <!-- .nav, .navbar-search, .navbar-form, etc -->

                    <ul class="nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>

                    </ul> 
                </div>

            </div>
        </div>
    </div>
    
    <div class="row-fluid">
    <p><div><br>&nbsp;<br></div></p>
    <!--p><div><br>&nbsp;<br></div></p-->
    </div>
<?php
 $opcion = (isset($_GET['opcion'])) ? $_GET['opcion'] : 0;
 if ($opcion == 2){
?>
    <div class="page-header" align="center">
    <p>
    <h1>Gracias por Registrarse</h1>
    <?php
    include 'mensajes_constantes.php';
    include 'mensajes.php';
    ?>
    </p>
</div>
<div class="row-fluid">
  <blockquote>
      <span class="label label-info"> <i class="icon-info-sign icon-white"></i> Importante </span>
      <p> Mail confirmado con &eacute;xito, por favor ingrese al sistema para completar el proceso. </p>
      <small> Terminado este paso usted podr&aacute; hacer uso de todos los servicios de Holidays Reminder. </small>
  </blockquote>
  <div class="row-fluid">
    <div class="span3">&nbsp;</div>
    <div class="span6 well">
        <form name="formulario" id="formulario" class="form-horizontal" action="validar.php" method="post" autocomplete="off">
        <fieldset>
            <legend>Ingresa tus datos </legend>
        </fieldset>
            
        <label class="control-label">Usuario</label>
           <div class="controls docs-input-sizes">
            <p>
            <input name="usu" id="nombre" type="text" class="span3 text" maxlength="30" placeholder="Nombre de Usuario" required>
            <i class="icon-flag"></i>
            </p>
           </div>
        <label class="control-label">Password</label>
           <div class="controls docs-input-sizes">
            <p>
            <input name="pass" type="password" class="span3 text" maxlength="30" placeholder="Password" required>
            <i class="icon-flag"></i>
            </p>
           </div>
        <div align="center">
            <button type="submit" class="btn-large btn-primary">Sign In</button>
        </div>
        </form>
    </div>
  </div>
<?php 
 }
 else{
 ?>
    <div class="page-header" align="center">
    <p>
    <h1>Gracias por Registrarse</h1>
    </p>
</div>
<div class="row-fluid">
  <blockquote>
      <span class="label label-info"> <i class="icon-info-sign icon-white"></i> Importante </span>
      <p> Los Servicios prestados por Holiday Remider son gratis, recuerde revisar su email para poder completar con el registro, en caso de no encontrar nuestro email, revise la carpeta de correo no deseado o contactese con nuestro servicio de atenci&oacute;n </p>
      <small> Una vez chequeado el email usted podr&aacute; hacer uso de todos los servicios de Holidays Reminder. </small>
  </blockquote>
    <div class="span12" align="center">
        <a href="index.php" class="btn-large btn-success"><i class="icon-home icon-white"></i> Volver</a>
    </div> 
 <?php   
 }
 ?>

    
      
    
</div>
</body>
</html>