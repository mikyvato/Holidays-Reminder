<?php
session_start();
//include 'seguridad.php';
//---- Autenticado 
if ($_SESSION['AUTENTICADO'] != 1)
    header("Location: login.php");
$atajo = (isset($_GET['atajo']))?$_GET['atajo']:0;
?>

<div class="row-fluid">

    <!------------------CONTENEDOR----------------------->
    <div class="container-fluid">

        <!-----------------BARRA NEGRA --------------------->
        <div class="row-fluid">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="brand" href="#">Holidays Remider&nbsp;&nbsp;</a>

                        <ul class="nav">
                            <!--li class="dropdown" id="menu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#menu"> Clientes <b class="caret"></b> </a>
                                <ul class="dropdown-menu">        
                                    <li><a href="clientes.php">Clientes</a></li>
                                    
                                </ul>
                            </li-->
                            <li <?php if ($atajo==1) echo "class=\"active\""; ?>>
                                <a href="clientes.php?atajo=1">Clientes</a>
                            </li>
                            <li <?php if ($atajo==2) echo "class=\"active\""; ?>>
                                <a href="feriados.php?atajo=2">Feriados</a>
                            </li>
                            
                            
                            <li>
                                <a href="logoff.php">Salir</a>
                            </li>
                        </ul>
                        <ul class="nav pull-right">
                            <li>
                                <div align="center"><font size="includeNone"><p><strong>Usuario: </strong></p></font></div>
                            </li>
                            <li>
                                <p><a href="cambiarPass.php"> <?php echo $_SESSION['usuario'];  ?> </a></p>
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
