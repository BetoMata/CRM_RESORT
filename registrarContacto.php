<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
	<title>Registro Contacto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body id="Contacto">
	<a name="Inicio"></a>
  	<header>
    	<img src="img/logo.png">
    	<nav class="menu">
        	<ul>
	          <li><a href="index.php">Inicio</a></li>
	          <li><a href="ventasResort2.php">Reservaciones</a></li>
	          <li><a href="loginClientes.html">Mis Viajes</a></li>
	          <li><a href="contactoResort.html">Contacto</a></li>
	          <li><a href="about.html">Nosotros</a></li>
	        </ul>
	    </nav>
  	</header>
	<div class="mainContacto">

        <?php
	        $nombreDato=$_POST['nombreDato'];
	        $apellidoDato=$_POST['apellidoDato'];
	        $correoDato=$_POST['correoDato'];
	        $numeroDato=$_POST['numeroDato'];

	        $numeroDato = str_replace(" ", "", $numeroDato); //Eliminamos los espacios en blanco

	        Print("<h1 id='alert'>Recibiras más información muy pronto.</h1><br>");

	        Print("<a href='index.php' id='regresar'>Regresar</a>");
            include("ControladorBD.php");

	        $Con = conectar();
	        $SQL = "INSERT INTO leads VALUES (default, '$nombreDato','$apellidoDato', '$correoDato', '$numeroDato');";
	        $Cons = consultar($Con,$SQL);
	        cerrar($Con);
        ?>
	</div>


	<footer id="contacto">
	    <div class="partFooter">
	      <img src="img/logo.png" alt="">
	    </div>
	    <div class="partFooter">
	      <h4>Hotel & Resort</h4>
	      <a href="index.php">Inicio</a>
	    </div>
	    <div class="partFooter">
	      <h4>Acerca de</h4>
	      <a href="about.html">Hotel & Resort</a>
	    </div>
	    <div class="partFooter">
	        <h4>Redes sociales</h4>
	        <div class="social-media">
	            <a href="#">f</a>
	        </div>
	    </div>
	  </footer>
</body>
</html>