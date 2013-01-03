<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<LINK REL="Shortcut Icon" HREF="img/03.png">
<title>Gesti&oacute;n de Feriados</title>
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
        include 'funciones.php';
        
        $idFeriados = (isset($_GET['idFeriados'])) ? $_GET['idFeriados'] : 0;
        
        if ($idFeriados > 0){
            $opcion = 2;
            
            $sql = "SELECT * FROM feriado WHERE idFeriados = $idFeriados ";
            $valor = sql_get($sql);
            
            $FeriadoFecha = fecha_hora_normal($valor['FeriadoFecha']);
            $FeriadoDias = $valor['FeriadoDias'];
            $FeriadoNombre = $valor['FeriadoNombre'];
        }
        else{
            $opcion = 1;
            $FeriadoFecha = date('d/m/Y');
            $FeriadoDias = '';
            $FeriadoNombre = '';
        }
        
        ?>
    </div>
    <div class="page-header" align="center">
        <p>
        <h1>Nuevo Feriado</h1>
        </p>
    </div>
    <div class="row-fluid">
        <blockquote>
            <span class="label label-info"> <i class="icon-info-sign icon-white"></i> Importante </span>
            <p> Aqu&iacute; udsted podr&aacute; crear y editar sus d&iacute;as no laborales. </p>
            <small> Recuerde cargar los datos correctos para un mejor servicio. </small>            
        </blockquote>
    </div>
    
<div class="row-fluid">
    <div class="span3">&nbsp;</div>
    <div class="span6 well">
        <form name="formulario" id="formulario" class="form-horizontal" action="ABM_Feriados.php" method="post" autocomplete="off">
        <fieldset>
            <legend>Datos del Feriado</legend>
        </fieldset>
            <!-- Control group -->
            <div class="control-group">
                <label class="control-label">Nombre</label>
                <div class="controls docs-input-sizes">
                    <p>
                      <input name="FeriadoNombre" id="nombre" value="<?php echo $FeriadoNombre; ?>" type="text" maxlength="200" class="span3 text" placeholder="Nombre del Feriado" required>
                      <i class="icon-flag"></i>
                    </p>
                </div>
                
                <label class="control-label date" for="inputIcon">Fecha</label>
                <div class="controls docs-input-sizes date" id="dp2" data-date="<?php echo date("d/m/Y");?>" data-date-format="dd/mm/yyyy">
                    <p>
                      <input name="FeriadoFecha" id="FeriadoFecha" value="<?php echo $FeriadoFecha; ?>" type="text" maxlength="10" class="span2" placeholder="Fecha del Feriado" required>
                      <span class="add-on"> <i class="icon-calendar"></i> </span>
                      <i class="icon-flag"></i>
                    </p>
                </div>
                                               
                <label class="control-label">D&iacute;as</label>
                <div class="controls docs-input-sizes">
                   <p>
                       <input name="FeriadoDias" type="number" min="0" max="8" value="<?php echo $FeriadoDias; ?>" class="span2" placeholder="N&uacute;mero de d&iacute;as" title="Debe ingresar un n&uacute;mero v&aacute;lido" required> <i class="icon-flag"></i>
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
              <input type="hidden" name="idFeriados" value="<?php echo $idFeriados;?>" >
            </div>
        </form>    
        
    </div> 
</div> 
    
</body>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    
    <!--script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="js/google-code-prettify/prettify.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/application.js"></script-->
     
    
     <!-- Analytics
    ================================================== -->

<script>
		$(function(){
			window.prettyPrint && prettyPrint();
			$('.dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});
		});
	</script>

</html>
