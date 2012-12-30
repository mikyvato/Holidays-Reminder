<!-----------Mensajes de Informacion ------------->
<?php
	if (isset($_GET['resultado'])){ //--- Pregunto si existe la variable resultado que viene como variable en la URL
		
		$alert = array('1'=>'alert alert-error',
					   '2'=>'alert alert-success',
					   '3'=>'alert alert-info',
					   '4'=>'alert alert-block');
?>
<div class="row"> 

  <div class="span6 offset5"> 
      <spam class="close" data-dismiss="alert">&times;&nbsp;</spam>
	<div align="center" class="<? echo $alert[$_GET['resultado']];?>">  
    	<p>
            <?php echo $mostrar[$_GET['mostrar']];?>  
        </p>
	</div>
  </div>
	 
</div>
<?php
	}
?>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-alert.js"></script>

    <!-- Analytics
    ================================================== -->
    <script>
        
           $(".alert").alert()
        
      
    </script>

<!---------------------------------------------->