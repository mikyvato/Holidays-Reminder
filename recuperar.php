<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<title>Holidays Remider -- Recuperar Contrase&ntilde;a --</title>
<LINK REL="Shortcut Icon" HREF="img/03.png">
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
    <?php
    include 'mensajes_constantes.php';
    include 'mensajes.php';
    ?>
    </div>

    <div class="page-header" align="center">
    <p>
    <h1>Recuperar contrase&ntilde;a</h1>
    </p>
</div>
<div class="row-fluid">
  <blockquote>
      <span class="label label-warning"> <i class="icon-info-sign icon-white"></i> Importante </span>
      <p> Pro favor, ingrese el email utilizado en el proceso de registraci&oacute;n. No olvide revisar la casilla de correo no deseado</p>
      <small> Terminado este paso usted podr&aacute; hacer uso de todos los servicios de Holidays Reminder nuevamente. </small>
  </blockquote>
</div>
<div class="row-fluid">
    <div class="span3">&nbsp;</div>
    <div class="span6 well">
        <form name="formulario" id="formulario" class="form-horizontal" action="ABM_Usuario.php" method="post" autocomplete="off">
        <fieldset>
            <legend>Ingrese email de la cuenta </legend>
        </fieldset>
            <!-- Control group -->
            <div class="control-group">
                <label class="control-label">e-mail</label>
                <div class="controls docs-input-sizes">
                    <p>
                      <input name="usuMail" id="nombre" type="text" class="span3 text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Nombre del Usuario" required>
                      <i class="icon-flag"></i>
                    </p>
                </div>
            </div>
            <!-- Mensaje de Informaci�n -->
              <div class="alert alert-info">
                <i class="icon-flag"></i> Los elementos marcados son de caracter obligatorio
              </div> 
              <!-- fin mensaje de informacion -->
	      <div align="center">
                <button class="btn btn-primary" type="submit">
                  <i class="icon-arrow-right icon-white"></i> Enviar
                </button>
              </div>
              <input type="hidden" name="opcion" value="3" >
        </form>
    </div>
</div>
    
</body>
</html>
