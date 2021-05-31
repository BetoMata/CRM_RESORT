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
	          <li><a href="#svs">Inicio</a></li>
	          <li><a href="#hatchback">Reservaciones</a></li>
	          <li><a href="#coupes">Mis Viajes</a></li>
	          <li><a href="contactoResort.html">Contacto</a></li>
	          <li><a href="productos.html">Nosotros</a></li>
        	</ul>
      	</nav>
  	</header>
	<div class="mainContacto">

        <?php
			$id_paqueteDato=$_POST['id_paqueteDato'];
			$clave_paqueteDato=$_POST['clave_paqueteDato'];
			$fechallegadaDato=$_POST['fechallegadaDato'];
			$fechasalidaDato=$_POST['fechasalidaDato'];
			$nombreDato=$_POST['nombreDato'];
			$correoDato=$_POST['correoDato'];
			$telDato=$_POST['telDato'];
			$aDato=$_POST['aDato'];
			$mDato=$_POST['mDato'];
			$edadmenoresDato=$_POST['edadmenoresDato'];
			$precioDato=$_POST['precioDato'];
			$precio_finalDato=$_POST['precio_finalDato'];
			
			Print("Gracias por realizar tu compra!"."<br>");

			include("ControladorBD.php");

	        $Con = conectar();
	        $SQL = "INSERT INTO ventas VALUES 
			(default, '$id_paqueteDato','$clave_paqueteDato','$fechallegadaDato','$fechasalidaDato','$nombreDato','$correoDato',
			'$telDato','$aDato','$mDato','$edadmenoresDato','$precioDato','$precio_finalDato', '0000');";
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
	      <a href="login.html">Inicio</a>
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