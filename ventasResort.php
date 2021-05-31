<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
	<title>Reservaciones</title>
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
		<?php
		$idDato=$_POST['idVenta'];
		$paqueteDato=$_POST['claveVenta'];
		include("ControladorBD.php");
        $Con = Conectar();
        $SQL = "SELECT I.ruta,P.descripcion,P.destino,P.salida,P.precio, P.id_paquete, P.clave FROM paquetes P, paquetes_img I WHERE  P.clave = I.clave  AND P.clave ='$paqueteDato' AND P.id_paquete = $idDato AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
        $Resultado = Consultar($Con,$SQL);
        //Procesar resultados

        $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.
        for($F=0;$F<$n;$F++){
        	$Fila = mysqli_fetch_row($Resultado);
        	// Obt el num de filas de  un vect
        print("
        <div class='mainVenta'>
	      	<div class='headerVenta'>
	      		<hr><h3>".$Fila[1].$Fila[5]."</h3><hr>
	      	</div>
	      	<div class='contentVenta'>
	      		<div class='contLeftVenta'>
	      			<img src='paquetes_img/".$Fila[0]."'>
	      		</div>
	      		<div class='contRightVenta'>
	      			
	      		</div>
	      	</div>
      	</div>");
			print("<br>");
			print(">");
         	print($Fila[5]);
         	print("/");
			print($Fila[6]);
			print("<");
			print("<br>");
			print("<div ><h3>".$Fila[1].$Fila[5]."</h3></div>");

			print("
			<form>
				<label>Destino: ".$Fila[2]."</label><br>
				<input type='hidden' name='destinoDato' maxlength='250' class='inputL' required><br>
				<label>Salida: ".$Fila[3]."</label><br>
				<input type='hidden' name='salidaDato' maxlength='250' class='inputL' required><br>
				<label>Fecha de Llegada</label><br>
				<input type='date' name='fechallegadaDato' class='inputL' required><br>	
				<label>Fecha de Salida</label><br>
				<input type='date' name='fechasalidaDato' class='inputL' required><br>
				<label># Adultos</label><br>
				<input type='number' onclick='calcular();' name='aDato' value='1' id='aDato' min='1' max='100' maxlength='3' class='inputCh' required><br>
				<label># Menores</label><br>
				<input type='number' onclick='calcular();' name='mDato' value='0' id='mDato' min='0' max='100' maxlength='3' class='inputCh' required><br>
				
				<label>Edades menores</label><br>
				<input type='text' placeholder='Ejemplo: 8, 12' maxlength='1'name='edadmenoresDato' class='inputCh' required><br>
				<label>Nombre</label><br>
				<input type='text' placeholder='Ejemplo: Juan Pérez' name='nombreDato' id='nombre' class='inputForm short' required><br>
				<label>Tu correo electrónico</label><br>
				<input type='email' name='correoDato' min='0' max='1' maxlength='1' class='inputCh' required><br>
				<label>Tel / Whatsapp</label><br>
				<input type='number' name='telDato' min='0' max='999' maxlength='3' class='inputCh' required><br>
				<input type='hidden'  name='pDato' value='".$Fila[4]."' id='pDato' required><br>

				<label>Precio:<h4>MXN$ <h2 id='precioR'></h2></h4></label>
				<input type='hidden'  name='pfinalDato' id='precioR' required><br>
					<script>
						function calcular(){
							var adulto=parseInt(document.getElementById('aDato').value);
							var menor=parseInt(document.getElementById('mDato').value);
							var precioU=parseInt(document.getElementById('pDato').value);
							document.getElementById('precioR').innerHTML=(adulto+menor)*precioU;
						}
						window.onload = calcular()
					</script>
				<input type='submit' name='submit' value='Guardar' class='btnEnviar'>
				</form>
			");

        };
        Cerrar($Con);
      ?>
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
