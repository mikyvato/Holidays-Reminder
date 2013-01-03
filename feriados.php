<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<LINK REL="Shortcut Icon" HREF="img/03.png">
<title>Gesti&oacute;n de Feriados</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <?php
    include 'botonera.php';
    include 'funciones.php'
    ?>
    
    <!-------------------Encabezado------------------>
    <div class="row-fluid">
        <p><div><br>&nbsp;<br></div></p>
        <!--p><div><br>&nbsp;<br></div></p-->
    </div>
    <div class="page-header" align="center">
        <p>
        <h1>Administraci&oacute;n de Feriados</h1>
        </p>
        <?php
        include 'funciones_db.php';
        include 'mensajes_constantes.php';
        include 'mensajes.php';
        
        $usuUsuario = (isset($_REQUEST['usuUsuario'])) ? $_REQUEST['usuUsuario'] : '';
        $IdUsuario = $_SESSION['idUsuarios'];
        ?>
    </div>
    
    <!-- Formulario de Busqueda --->
    <div class="row-fluid offset5">
        <div class="span4">
            <form class="well form-inline" action="clientes.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <input type="text" value="<? echo $usuUsuario;?>" name="usuUsuario" class="input-large" placeholder="Ingrese el nombre del Feriado">
                        <button type="submit" class="btn btn-success"><i class="icon-search icon-white"></i> Buscar</button> 
                        <input type="hidden" name="atajo" value="<?php echo $atajo;?>" >
                    </div>
                </fieldset>
            </form>
        </div>  
    </div>
    
    <div class="row-fluid offset2">
        <div class="span8 well">
            <p><a href="nuevoFeriado.php?atajo=2" class="btn btn-inverse"><i class="icon-plus-sign icon-white"></i> Nuevo Feriado </a></p>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Fecha</td>
                        <td>D&iacute;as</td>
                        <td colspan="2">Acciones</td>
                    </tr>
                </thead>
                <?php
                //-- Obtengo la lista de clientes --//
                $sql = " SELECT * FROM feriado ";
                $sql .= " WHERE feriadoNombre like '%$usuUsuario%'";
                $sql .= " AND Usuarios_idUsuarios = $IdUsuario ";
                $valor = sql_arreglo($sql);
                if (!$valor){
                    echo "<tr> <td colspan=6 aling=\"center\"><div align=\"center\"> No se encontraron Registros !</div> </td></tr>";
                }
                else{
                    //-- Cuerpo de la Tabla --//
                    foreach ($valor as $id=>$dato){
                        if ($dato['FerHabilitado'] == 0){  
                            $estado = 1;
                            $icono = "icon-ok";
                        }
                        else{
                            $estado = 0;
                            $icono = "icon-remove";
                        }
                    ?>
                <tr>
                    <td><?php echo $dato['idFeriados'];?></td>
                    <td><?php echo $dato['FeriadoNombre'];?></td>
                    <td><?php echo fecha_hora_normal($dato['FeriadoFecha']);?></td>
                    <td><?php echo $dato['FeriadoDias'];?></td>
                    
                    <td>
                    <div align="center">
                        <a href="nuevoFeriado.php?idFeriados=<?php echo $dato['idFeriados']."&atajo=".$atajo;?>">
                            <i class="icon-pencil" title="Editar Datos" alt="Editar Datos"></i>
                        </a>
                    </div>
                    </td>
                    <td>
                        <div align="center">
                            <a href="ABM_Feriados.php?opcion=3&atajo=<?php echo $atajo;?>&estado=<?php echo $estado;?>&idFeriados=<?php echo $dato['idFeriados'];?>" class="the-icons">
                                <i class="<?php echo $icono;?>" title="Borrar Datos" alt="Borrar Datos"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php    
                    }//-- fin foreach
                }//-- fin de else
                ?>
                <tbody>
                    <tr></tr>
                </tbody>
            </table>
        </div>
        
    </div>
    
</body>
</html>
