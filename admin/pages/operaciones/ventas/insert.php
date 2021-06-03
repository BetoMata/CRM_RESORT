<?php 
	include_once '../conexion.php';
	
	if(isset($_POST['guardar'])){
		$id_venta = $_POST['id_venta'];
		$id_paquete = $_POST['id_paquete'];
		$clave = $_POST['clave'];
		$fecha_salida = $_POST['fecha_salida'];
		$fecha_llegada = $_POST['fecha_llegada'];
		$fecha_compra = $_POST['fecha_compra'];
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$adultos = $_POST['adultos'];
		$menores = $_POST['menores'];
		$edad_menores = $_POST['edad_menores'];
		$precio = $_POST['precio'];
		$pago = $_POST['pago'];

		if(!empty($id_venta) && !empty($id_paquete) && !empty($clave) && !empty($fecha_salida) && !empty($fecha_llegada) && !empty($fecha_compra) && !empty($nombre) && !empty($correo) && !empty($telefono) && !empty($adultos) && !empty($menores) && !empty($edad_menores) && !empty($precio)&& !empty($pago) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO ventas(id_venta, id_paquete, clave, fecha_salida, fecha_llegada, fecha_compra, nombre, correo, telefono, adultos, menores, edad_menores, precio, pago) VALUES(:id_venta, :id_paquete, :clave, :fecha_salida, :fecha_llegada, :fecha_compra, :nombre, :correo, :telefono, :adultos, :menores, :edad_menores, :precio, :pago)');
				$consulta_insert->execute(array(
					':id_venta' =>$id_venta,
					':id_paquete' =>$id_paquete,
					':clave' =>$clave,
					':nombre' =>$nombre,
					':fecha_salida' =>$fecha_salida,
					':fecha_llegada' =>$fecha_llegada,
					':fecha_compra' =>$fecha_compra,
					':nombre' =>$nombre,
					':correo' =>$correo,
					':telefono' =>$telefono,
					':adultos' =>$adultos,
					':menores' =>$menores,
					':edad_menores' =>$edad_menores,
					':precio' =>$precio,
					':pago' =>$pago
				));
				header('Location: index.php');
			}
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
		<h2>VENTAS DEL SISTEMAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_venta" placeholder="ID VENTA" class="input__text">
				<input type="text" name="id_paquete" placeholder="ID PAQUETE" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="clave" placeholder="Clave" class="input__text">
				<input type="text" name="fecha_salida" placeholder="Fecha Salida" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="fecha_llegada" placeholder="Fecha Llegada" class="input__text">
				<input type="text" name="fecha_compra" placeholder="Fecha Compra" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="correo" placeholder="Correo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Telefono" class="input__text">
				<input type="text" name="adultos" placeholder="Adultos" class="input__text">
			</div> 
			<div class="form-group">
				<input type="text" name="menores" placeholder="Menores" class="input__text">
				<input type="text" name="edad_menores" placeholder="Edad Menores" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="precio" placeholder="Precio" class="input__text">
				<input type="text" name="pago" placeholder="Pago" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
