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
	      		<hr><h1>Descripción del paquete ".$Fila[6]."</h1><hr>
	      	</div>
	      	<div class='contentVenta'>	      		
	      		<div class='contLeftVenta'>
	      			<img src='paquetes_img/".$Fila[0]."'>
	      		</div>
	      		<div id='contRightVenta'>
	      			<h2>".$Fila[2]." todo incluido - 4 dias</h2>
	      			<h4>Desde $ ".$Fila[4].".00</h4>
	      			<h4>Recorrido: ".$Fila[3]." - ".$Fila[2]." - ".$Fila[3]."</h4>
	      			<div class='columnaForm'>
	      					<h3>Incluye:</h3>
	      					<h4>Vuelo Redondo:</h4>
	      					<h5>".$Fila[3]." - ".$Fila[2]." - ".$Fila[3]."</h5>
	      					<h4>Traslados:</h4>
	      					<h5>Aeropuerto - Hotel - Aeropuerto</h5>
	      					<h4>Equipaje documentado:</h4>
	      					<h5>Una maleta de 25kg y equipaje de mano de 10kg por pasajero</h5>
	      					<h4>Hotel:</h4>
	      					<h5>Todo incluido en el hotel de su elección. Precio por persona y en habitación doble.</h5>
	      					<h4>Otros:</h4>
	      					<h5>Impuestos y propinas</h5>
	      			</div>
	      			<div class='columnaForm'>
	      				<h3>No incluye:</h3>
	      				<h4>Tours</h4>
	      				<h4>Gastos personales</h4>
	      				<h3>Duración del viaje:</h3>
	      				<h4>4 dias y 4 noches</h4>
	      			</div>
	      		</div> 
	      	</div>
	      	<form method='POST' action='compraPaquete.php' class='formVenta'>
		      	<div class='headerVenta'>
		      		<hr><h1>Adquiere tu paquete ".$Fila[6]."</h1><hr>
		      	</div>
	      		<div id='contentFormVenta'>
					<div class='columnaV'>
		      			<label>Destino: ".$Fila[2]."</label><br>
						<label>Salida: ".$Fila[3]."</label><br>
						<label>Fecha de Llegada</label><br>
						<input type='date' name='fechallegadaDato' class='inputForm medium' required><br>	
						<label>Fecha de Salida</label><br>
						<input type='date' name='fechasalidaDato' class='inputForm medium' required><br>
		      		</div>
		      		<div class ='columnaV'>
						<label>Nombre Completo</label><br>
		      			<input type='text' placeholder='Ejemplo: Juan Pérez' name='nombreDato' id='nombre' class='inputForm large' required><br>
						<label>Tu correo electrónico</label><br>
						<input type='email' placeholder='ejemplo@correo.com' name='correoDato' class='inputForm large' required><br>
						<label>Tel / Whatsapp</label><br>
						<input type='tel' name='telDato' placeholder='123 450 6789' pattern='[0-9]{3} [0-9]{3} [0-9]{4}'' class='inputForm short' required><br>
		      		</div>
		      		<div class ='columnaV'>
						<label># Adultos</label>
						<input type='number' onclick='calcular();' name='aDato' value='1' id='aDato' min='1' max='100' maxlength='3' class='inputForm small' required><br>
						<label># Menores</label>
						<input type='number' onclick='calcular();' name='mDato' value='0' id='mDato' min='0' max='100' maxlength='3' class='inputForm small' required><br>
						<label>Edades menores</label>
						<input type='text' placeholder='Ejemplo: 8, 12' maxlength='1'name='edadmenoresDato' class='inputForm short' required><br>
		      		</div>
		      		<div class ='columnaV'>
						<input type='hidden'  name='pDato' value='".$Fila[4]."' id='pDato' required><br>
						<label>Precio:  <p> MXN$  <p id='precio_finalDato'></p>.00</p></label>	
							<script>
								function calcular(){
									var adulto=parseInt(document.getElementById('aDato').value);
									var menor=parseInt(document.getElementById('mDato').value);
									var precioU=parseInt(document.getElementById('pDato').value);
									document.getElementById('precio_finalDato').innerHTML=(adulto+menor)*precioU;
									document.getElementById('pagoDato').value= (adulto+menor)*precioU;
								}
								window.onload = calcular()
							</script>			
						<input type='hidden' name='pagoDato' id='pagoDato' value='0' required>			
						<input type='hidden' name='id_paqueteDato' value='".$Fila[5]."' required>
						<input type='hidden' name='clave_paqueteDato' value='".$Fila[6]."' required>
						<input type='hidden' name='precioDato' value='".$Fila[4]."' required><br>


						<input type='submit' name='submit' value='Comprar'class='enviarColumnaD short'>
		      		</div>
	      		</div>
	      		
			</form>
      	</div>");
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
