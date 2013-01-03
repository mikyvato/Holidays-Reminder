<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<LINK REL="Shortcut Icon" HREF="img/03.png">
<title>Gesti&oacute;n de Clientes</title>
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
        
        $idClientes = (isset($_GET['idClientes'])) ? $_GET['idClientes'] : 0;
        
        if ($idClientes > 0){
            $opcion = 2;
            
            $sql = "SELECT * FROM cliente WHERE idClientes = $idClientes ";
            $valor = sql_get($sql);
            
            $CliNombre = $valor['CliNombre'];
            $CliMail = $valor['CliMail'];
            $provincia_idProvincias = $valor['provincia_idProvincias'];
            $provincia_Pais_idPais = $valor['provincia_Pais_idPais'];
        }
        else{
            $opcion = 1;
            $CliNombre = '';
            $CliMail = '';
            $provincia_idProvincias = '';
            $provincia_Pais_idPais = '';
        }
        
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
            <p> Aqu&iacute; udsted podr&aacute; crear y editar sus clientes. </p>
            <small> Recuerde cargar los datos correctos para un mejor servicio. </small>            
        </blockquote>
    </div>
    
<div class="row-fluid">
    <div class="span3">&nbsp;</div>
    <div class="span6 well">
        <form name="formulario" id="formulario" class="form-horizontal" action="ABM_Clientes.php" method="post" autocomplete="off">
        <fieldset>
            <legend>Datos del Cliente</legend>
        </fieldset>
            <!-- Control group -->
            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls docs-input-sizes">
                    <p>
                      <input name="CliNombre" id="nombre" value="<?php echo $CliNombre; ?>" maxlength="120" type="text" class="span3 text" placeholder="Nombre del Cliente" required>
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
                                    if ($valorPro['idPais']==$provincia_Pais_idPais)
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
                                        if ($valorPro['idProvincias']==$provincia_idProvincias)
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
                      <input name="CliMail" type="text" value="<?php echo $CliMail; ?>" maxlength="150" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="span3 text" id="mail" placeholder="e-mail de Contacto" title="Se requiere un email valido" required><i class="icon-flag"></i>
                   </p>
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
              <input type="hidden" name="opcion" value="<?php echo $opcion;?>" >
              <input type="hidden" name="idClientes" value="<?php echo $idClientes;?>" >
            </div>
        </form>    
        
    </div> 
</div> 
    
</body>
<script src="js/jquery.js"></script>
<script>
    $(function() { 
        $(document).ready(function () {
            $("#pais").change(function(){
                //si estas trabajando con php recorda cambiar .asp por .php
                $.post("carga_select2.php",{ id:$(this).val() },function(data){$("#provincia").html(data);})
            });
        });
    })
</script>
</html>
