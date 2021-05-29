<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
	<title>Contacto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/swiper.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
	<body id="Contacto">
		<a href="catalogoResort.php"></a>
		<header>
		  	<img src="img/logo.png">
		  	<nav class="menu">
		      	<ul>
		        	<li><a href="catalogoResort.php">Principal</a></li>
		        	<li><a href="#sedanes">Seccion X</a></li>
		        	<li><a href="#hatchback">Seccion X</a></li>
		        	<li><a href="#coupes">Seccion X</a></li>
		        	<li><a href="productos.html">Productos</a></li>
        			<li><a href="contactoResort.html">Contacto</a></li>
		      	</ul>
		    </nav>
		</header>
		<?php
		$idDato=$_POST['paqueteVentaid'];
		$paqueteDato=$_POST['paqueteVenta'];
		print("-");
		print($idDato);
		print("-");
		print($paqueteDato);
		print("-");
		include("ControladorBD.php");
        $Con = Conectar();
        $SQL = "SELECT I.ruta,P.descripcion,P.destino,P.salida,P.precio, P.id_paquete, P.clave FROM paquetes P, paquetes_img I WHERE P.tipo = 2 AND P.clave = I.clave  AND P.clave = 'A2020LUGAR2'  AND P.id_paquete = 2 AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
        $Resultado = Consultar($Con,$SQL);
        //Procesar resultados

        $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.
		print($n);
        for($F=0;$F<$n;$F++)
        {
          $Fila = mysqli_fetch_row($Resultado);// Obt el num de filas de  un vect
          print($Fila[5]);
		  print($Fila[6]);
		  print("<div ><img src='paquetes_img/".$Fila[0]."'><h3>".$Fila[1].$Fila[5]."</h3></div>");
        };
        
        Cerrar($Con);
      ?>
	</body>
</html>
