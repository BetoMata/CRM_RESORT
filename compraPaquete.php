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
			$id_paqueteDato=$_POST['id_paqueteDato'];
			$clave_paqueteDato=$_POST['clave_paqueteDato'];
			$fechallegadaDato=$_POST['fechallegadaDato'];
			$fechasalidaDato=$_POST['fechasalidaDato'];
			$fechacompraDato=$_POST['fechasalidaDato'];
			$nombreDato=$_POST['nombreDato'];
			$correoDato=$_POST['correoDato'];
			$telDato=$_POST['telDato'];
			$aDato=$_POST['aDato'];
			$mDato=$_POST['mDato'];
			$edadmenoresDato=$_POST['edadmenoresDato'];
			$precioDato=$_POST['precioDato'];
			$precio_finalDato=$_POST['pagoDato'];
		
			$telDato = str_replace(" ", "", $telDato);
	        Print("<h1 id='alert'>¡Gracias por realizar tu compra!</h1><br>");
	        Print("<a href='index.php' id='regresar'>Regresar</a>");

			include("ControladorBD.php");

	        $Con = conectar();
	        $SQL = "INSERT INTO ventas VALUES 
			(default, '$id_paqueteDato','$clave_paqueteDato','$fechallegadaDato','$fechasalidaDato','$fechacompraDato','$nombreDato','$correoDato',
			'$telDato','$aDato','$mDato','$edadmenoresDato','$precioDato','$precio_finalDato');";
	        $Cons = consultar($Con,$SQL);
	        cerrar($Con);

        ?>

	    <script>
		    function alert(){
			    alert("Tus datos se han guardado correctamente!");
		    }
	    </script>

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