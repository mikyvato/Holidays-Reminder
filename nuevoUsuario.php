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
    
<!-------------------BANNERS------------------>
<div class="row-fluid">
    <p><div><br>&nbsp;<br></div></p>
    <!--p><div><br>&nbsp;<br></div></p-->
    <?php
    include 'funciones_db.php';
    include 'mensajes_constantes.php';
    include 'mensajes.php';
    
    $idUsuarios = (isset($_REQUEST['idUsuarios'])) ? $_REQUEST['idUsuarios'] : 0;
    if ($idUsuarios > 0){
        $sql = "SELECT * FROM usuario WHERE idUsuarios = $idUsuarios ";
        $arreglo = sql_get($sql);
        
        $usuNombre = $arreglo['UsuNombre'];
        $idPais = $arreglo['Provincias_Pais_idPais'];
        $idProvincias = $arreglo['Provincias_idProvincias'];
        $usuMail = $arreglo['UsuMail'];
        $usuPass = $arreglo['UsuPass'];
        $usuUsuario = $arreglo['UsuUsuario'];
        $opcion = 2;
    }
    else{
        $usuNombre = '';
        $idPais = '';
        $idProvincias = '';
        $usuMail = '';
        $usuPass = '';
        $usuUsuario = '';
        $opcion = 1;
    }
    ?>
</div>
<div class="page-header" align="center">
    <p>
    <h1>Ficha de Ingreso</h1>
    </p>
</div>
<div class="row-fluid">
  <blockquote>
      <span class="label label-info"> <i class="icon-info-sign icon-white"></i> Importante </span>
      <p> Los Servicios prestados por Holiday Remider son gratis, recuerda completar todos tus datos </p>
      <small> Al hacer clic en Reg&iacute;strate, muestras tu conformidad con nuestras Condiciones y aceptas haber le&iacute;do nuestra Pol&iacute;tica de uso de datos, incluida la secci&oacute;n sobre Uso de cookies. </small>
</blockquote>
</div>
<div class="row-fluid">
    <div class="span3">&nbsp;</div>
    <div class="span6 well">
        <form name="formulario" id="formulario" class="form-horizontal" action="ABM_Usuario.php" method="post" autocomplete="off">
        <fieldset>
            <legend>Reg&iacute;strate ingresa tus datos </legend>
        </fieldset>
            <!-- Control group -->
            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls docs-input-sizes">
                    <p>
                      <input name="usuNombre" value="<?php echo $usuNombre; ?>" id="nombre" type="text" class="span3 text" maxlength="120" placeholder="Nombre del Usuario" required>
                      <i class="icon-flag"></i>
                    </p>
                </div>
                
                <label class="control-label"> Pa&iacute;s </label>
                <div class="controls">
                    <p>
                        <select name="idPais" id="pais">
                            <option value="0"> Seleccione un Pa&iacute;s </option>
                            <?php 
                            $pro = "SELECT * FROM pais WHERE PaisHabilitado = 1 ";
                            $pais = sql_arreglo($pro);
                            if ($pais){
                                foreach ($pais as $valorPro){
                                    if ($valorPro['idPais'] == $idPais)
                                        $select = "selected";
                                    else
                                        $select = '';
                                    echo "<option value=\"".$valorPro['idPais']."\" $select>".$valorPro['PaisNombre']."</option>";
                                }
                            }
                            ?>
                        </select>
                        <i class="icon-flag"></i>
                    </p>
                </div>
                
                <label class="control-label"> Provincia </label>
                <div class="controls">
                    <p>
                        <select name="idProvincias" id="provincia" class="text">
                            <option value="0"> Seleccione una Provincia </option>
                            <?php 
                            if ($opcion == 2){
                                $pro = "SELECT * FROM `provincia` WHERE `ProvHabilitado` = 1 ";
                                $Provincia = sql_arreglo($pro);
                                if ($Provincia){
                                    foreach ($Provincia as $valorPro){
                                        if ($valorPro['idProvincias']==$idProvincias)
                                            $select = "selected";
                                        else
                                            $select = '';
                                        echo "<option value=\"".$valorPro['idProvincias']."\" $select>".$valorPro['ProvNombre']."</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                        <i class="icon-flag"></i>
                    </p>
                </div>
                
                <label class="control-label">e-mail</label>
                <div class="controls docs-input-sizes">
                   <p>
                      <input name="usuMail" value="<?php echo $usuMail; ?>" type="text" maxlength="120" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="span3 text" id="mail" placeholder="e-mail de Contacto" title="Se requiere un email valido" required><i class="icon-flag"></i>
                   </p>
                </div>
                
                <label class="control-label">Usuario</label>
              <div class="controls docs-input-sizes">
                <p>
                    <input name="usuUsuario" value="<?php echo $usuUsuario; ?>" id="usuUsuario" maxlength="30" type="text" class="text span3" placeholder="usuario de Logueo" required>
                  <i class="icon-flag"></i>
                </p>
              </div>
              
              <label class="control-label">Contrase&ncaron;a</label>
              <div class="controls docs-input-sizes">
                <p>
                    <input name="usuPass" id="usuPass" value="<?php echo $usuPass; ?>" type="password" maxlength="30" class="span3 text" placeholder="password" required>
                  <i class="icon-flag"></i>
                </p>
              </div>
              
              <label class="control-label">Repita Contrase&ncaron;a</label>
              <div class="controls docs-input-sizes">
                <p>
                    <input name="usuPass2" id="usuPass2" value="<?php echo $usuPass; ?>" type="password" maxlength="30" class="span3 text" placeholder="password" required>
                  <i class="icon-flag"></i>
                </p>
              </div>
              
              <!-- Mensaje de Informaci�n -->
              <div class="alert alert-info">
                <i class="icon-flag"></i> Los elementos marcados son de caracter obligatorio
              </div> 
              <!-- fin mensaje de informacion -->
	      <div align="center">
                <button class="btn btn-primary" type="submit">
                  <i class="icon-arrow-right icon-white"></i> Reg&iacute;strate
                </button>
              </div>
              <?php 
              if ($opcion == 2)
                echo "<input type=\"hidden\" name=\"opcion\" value=\"4\" >";  
              else
                echo "<input type=\"hidden\" name=\"opcion\" value=\"1\" >";    
              
              echo "<input type=\"hidden\" name=\"idUsuarios\" value=\"$idUsuarios\" >";  
              ?>    
            </div>
        </form>    
        
    </div> 
</div> 
</body>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <!--script type="text/javascript" src="js/validity/jQuery.validity.min.js"></script-->
    
     <!-- Analytics
    ================================================== -->  

        <script type="text/javascript">
            $(function() { 
                $(document).ready(function () {
                    $("#pais").change(function(){
                        //si estas trabajando con php recorda cambiar .asp por .php
                        $.post("carga_select2.php",{ id:$(this).val() },function(data){$("#provincia").html(data);})
                     });
                    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
                    $("#formulario").submit(function (){
                    $(".error").remove();
                        if( $("#pais option:selected").val() == 0 ){
                            $("#pais").focus().after("<span class='error'>Selecciones un Pa&iacute;s </span>");
                            return false;
                        }else if( $("#provincia option:selected").val() == 0 ){
                            $("#provincia").focus().after("<span class='error'>Selecciones una Provincia </span>");
                            return false;
                        }else if ( $("#usuPass").val() != $("#usuPass2").val()){
                            $("#usuPass, #usuPass2").focus().after("<span class='error'>Password no verificado </span>");
                            return false;
                        }else if( $("#mail").val().length == 0 && !emailreg.test($("#mail").val()) ){
                            $("#mail").focus().after("<span class='error'>Ingrese un email V&aacute;lido</span>");
                            return false;
                        }else
                            return true;
                    });
                    $(".text").keyup(function(){
                        if( $(this).val() != "" ){
                            $(".error").fadeOut();
                            return false;
                        }
                    });
                });             
            });
         
  </script>
</html>
