<?php 
	include_once '../conexion.php';
	
	if(isset($_POST['guardar'])){
		$id_paquete = $_POST['id_paquete'];
		$clave = $_POST['clave'];
		$salida = $_POST['salida'];
		$destino = $_POST['destino'];
		$descripcion = $_POST['descripcion'];
		$paquete = $_POST['paquete'];
		$precio = $_POST['precio'];
		$dias = $_POST['dias'];
		$disponibilidad = $_POST['disponibilidad'];
		$status = $_POST['status'];
		$tipo = $_POST['tipo'];
		$vencimiento = $_POST['vencimiento'];

		if(!empty($clave) && !empty($salida) && !empty($destino) && !empty($descripcion) && !empty($paquete) && !empty($precio) && !empty($dias) && !empty($disponibilidad) && !empty($status) && !empty($tipo) && !empty($vencimiento)){
			$consulta_insert=$con->prepare('INSERT INTO paquetes(:id_paquete, :clave, :salida, :destino, :descripcion, :paquete, :precio, :dias, :disponibilidad, :status, :tipo, :vencimiento)');
			$consulta_insert->execute(array(
				':id_paquete' =>$id_paquete,
				':clave' =>$clave,
				':salida' =>$salida,
				':destino' =>$destino,
				':descripcion' =>$descripcion,
				':paquete' =>$paquete,
				':precio' =>$precio,
				':dias' =>$dias,
				':disponibilidad' =>$disponibilidad,
				':status' =>$status,
				':tipo' =>$tipo,
				':vencimiento' =>$vencimiento
			));
			header('Location: index.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_paquete" placeholder="ID" class="input__text">
				<input type="text" name="clave" placeholder="Clave" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="salida" placeholder="Salida" class="input__text">
				<input type="text" name="destino" placeholder="Destino" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="descripcion" placeholder="Descripcion" class="input__text">
				<input type="text" name="paquete" placeholder="Paquete" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="precio" placeholder="Precio" class="input__text">
				<input type="text" name="dias" placeholder="Dias" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="disponibilidad" placeholder="Disponibilidad" class="input__text">
				<input type="text" name="status" placeholder="status" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="tipo" placeholder="Tipo" class="input__text">
				<input type="text" name="Vencimiento" placeholder="Vencimiento" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
