<!DOCTYPE html>
<html lang="es">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<title>Holidays Remider</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<!------------------CONTENEDOR-------------------------------->
<div class="container-fluid">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

            <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <!-- Be sure to leave the brand out there if you want it shown -->
            <a class="brand" href="#">Holidays Reminder</a>
            
            <!-- Everything you want hidden at 940px or less, place within here -->
            <div class="nav-collapse collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -->
                
                <ul class="nav pull-left">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    
                </ul>                
            <!--/div>
            <div class="nav-collapse collapse "-->
                <form class="navbar-form pull-right" action="validar.php" method="post">
                  <input type="text" name="usu" class="span2" placeholder="Usuario" required>
                  <input type="text" name="pass" class="span2" placeholder="Password" required>
                  <button type="submit" class="btn">Sign In</button>
                  <a hreg="#" class="btn">Sign Up</a>
                </form>
                
            </div>
            
            </div>
        </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    
    <div class="hero-unit">
      <h1>Holiday Reminder</h1>
      <p>Es una aplicaci&oacute;n pensada y dise&ntilde;ada para las empresas, para que las mismas puedan comunicarse de forma r&aacute;pida y sencilla con sus clientes que residen en diferentes partes del mundo.
          El objetivo principal es contar con una mecanismo de notificaciones, desde las empresas hacia los clientes. Mas especificamente, seg&uacute;n en que parte del mundo nos encontremos
          los d&iacute;as no laborables para nuestra empresa pueden no ser los mismos que los de nuestro cliente, por lo que ser&iacute;a conveninete comunicar con tiempo a nuestros dias de franco y que no podremos atenderlos.
      </p>
      <p>
        <a class="btn btn-primary btn-large pull-right">
          Learn more
        </a>
      </p>
    </div>
    <div class="row-fluid">
        <div class="span4">
            <h2>Confiabilidad</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            <p>
                <a class="btn" href="#">View details</a>
            </p>
        </div>
        <div class="span4">
            <h2>Seguimiento</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            <p>
                <a class="btn" href="#">View details</a>
            </p>
        </div>
        <div class="span4">
            <h2>Open Source</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
            <p>
                <a class="btn" href="#">View details</a>
            </p>
        </div>
        
    </div>
</div>
</body>
</html>
