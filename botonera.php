<?php
session_start();
include 'seguridad.php';
//---- Autenticado 
if ($_SESSION['AUTENTICADO'] != 1)
    header("Location: login.php");

//---- Variable que me indica en Modulo estoy
if (isset($_REQUEST["indice"])){
    $indice = $_REQUEST["indice"];
 
    $rmnew = $_SESSION['ROL'][$indice]['rmNew'];
    $rmedit = $_SESSION['ROL'][$indice]['rmEdit'];
    $rmdel = $_SESSION['ROL'][$indice]['rmDel'];
}
else
    header("Location: login.php");


//---- Para armar dinamicamente el Boton  VOLVER ----//
$PaginaActual = $_SERVER['PHP_SELF'];

if (isset($_SESSION['URINUEVA']))
    if ($_SESSION['URINUEVA'] != $PaginaActual)
        $_SESSION['URIANT']=$_SESSION['URINUEVA'];

$_SESSION['URINUEVA']=$PaginaActual;

$atajo = (isset($_REQUEST["atajo"])) ? $_REQUEST["atajo"] : 0;
/* @var $constante guarda valores para saber en que modulo me encuentro */
$constante = "indice=$indice&atajo=$atajo";

?>

<div class="row-fluid">

    <!------------------CONTENEDOR----------------------->
    <div class="container-fluid">

        <!-----------------BARRA NEGRA --------------------->
        <div class="row-fluid">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand" href="#"><img border="1" align="center" height="35" width="115" src="images/logo.jpg"></a>

                        <ul class="nav">
                            <?php
                            if ($_SESSION['rolAdmin'] == 1){ ?>
                            <li class="dropdown" id="menu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#menu"> Administraci&oacute;n <b class="caret"></b> </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    
                                    foreach ($_SESSION["ROL"] as $clave => $valor) { 
                                        if ($valor['rmAdmin']==1)
                                            echo "<li><a href=\"".$valor['modLink']."?indice=".$clave."&atajo=".$valor['IdModulo']."\">". $valor['modNombre']. "</a></li>";
                                    }    
                                    ?>
                                </ul>
                            </li>
                            <?php
                            }
                            foreach ($_SESSION["ROL"] as $clave => $valor) { 
               
                                if ($clave == $indice)
                                    $clase = "active";
                                else
                                    $clase = "";
                                
                                if ($valor['rmAdmin'] == 0)
                                    if ($valor['modAtajo'] == 0)
                                        echo "<li class=\"$clase\"><a href=\"".$valor['modLink']."?indice=".$clave."&atajo=".$valor['IdModulo']."\">".$valor['modNombre']."</a></li>";
                                    else{
                                            echo '<li class="dropdown" id="menu_'.$valor['IdModulo'].'">';
                                            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#menu_'.$valor['IdModulo'].'">'.$valor['modNombre'].'<b class="caret"></b> </a>';
                                            echo '<ul class="dropdown-menu">';
                                                
                                                //--- Busco los modulos para formar el desplegable ---//
                                                $ata = " SELECT modulo.IdModulo, modulo.modNombre, modulo.modLink, modAtajo.AtIcono, modAtajo.IdDestino "; 
                                                $ata .= " FROM modAtajo ";
                                                $ata .= " LEFT JOIN modulo ON modAtajo.IdDestino=modulo.IdModulo";
                                                $ata .= " WHERE ";
                                                $ata .= " modAtajo.IdModulo = ".$valor['IdModulo'];

                                                $atajos = sql_arreglo($ata);
                                        
                                                if ($atajos){
                                                    foreach ($atajos as $claveAt => $valorAt){
                                                        echo "<li><a href=\"".$valorAt['modLink']."?indice=".$clave."&atajo=".$valor['IdModulo']."\">". $valorAt['modNombre']. "</a></li>";
                                                    }
                                                } ?>
                                                </ul>
                                        </li>
                                    <?php 
                                    }
                            }
                            ?>

                            <li>
                                <a href="logoff.php">Salir</a>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li>
                                <div align="center"><font size="includeNone"><p><strong>Usuario: </strong></p></font></div>
                            </li>
                            <li>
                                <p><a href="cambiarPass.php?IdUsuario=<?php echo $_SESSION['IdUsuario']."&indice=".$clave."&atajo=".$valor['IdModulo']; ?>"> <? echo "  " . $_SESSION["usuUsuario"]; ?></a></p>
                            </li>
                        </ul>

                    </div>
                    <div class="row-fluid" style="background-color:#82e222">.</div>

                </div>
            </div>

        </div> <!-- barra negra -->

    </div> <!--contenedor-->
</div>


<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>

    <!-- Analytics
    ================================================== -->
    <script>
      
        $('.dropdown-toggle').dropdown();
      
    </script>
