<?php
	include_once '../conexion.php';

	if(isset($_GET['id_ventas'])){
		$id_venta=(int) $_GET['id_usuario'];

		$buscar_id=$con->prepare('SELECT * FROM ventas WHERE id_venta =: id_venta LIMIT 1');
		$buscar_id->execute(array(
			'id_venta' => $id_venta
		));
		$resultado = $buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$id_venta=$_POST['id_venta'];
		$id_paquete=$_POST['id_paquete'];
		$clave=$_POST['clave'];
		$fecha_salida=$_POST['fecha_salida'];
		$fecha_llegada=$_POST['fecha_llegada'];
		$fecha_compra=$_POST['fecha_compra'];
		$nombre=$_POST['nombre'];
		$correo=$_POST['correo'];
		$telefono=$_POST['telefono'];
		$adultos=(int) $_GET['adultos'];
		$menores=(int) $_GET['menores'];
		$edad_menores=(int) $_GET['edad_menores'];

		if(!empty($id_venta) && !empty($id_paquete) && !empty($clave) && !empty($fecha_salida) && !empty($fecha_llegada)  && !empty($fecha_compra)  && !empty($nombre)  && !empty($correo) && !empty($telefono) && !empty($adultos)&& !empty($menores) && !empty($edad_menores) && !empty($precio) && !empty($pago)){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE ventas SET  
					id_venta=: id_venta,
					id_paquete =: id_paquete,
					clave =: clave,
					fecha_salida =: fecha_salida,
					fecha_llegada =: fecha llegada,
					fecha_compra =: fecha_compra,
					nombre =: nombre,
					correo =: correo,
					telefono =: telefono,
					adultos =: adultos,
					menores =: menores,
					edad_menores =: edad_menores,
					precio =: precio,
					pago =: pago,
					WHERE id_venta =: id_venta;'
				);
				$consulta_update->execute(array(
					':id_venta' =>$id_venta,
					':id_paquete' =>$id_paquete,
					':clave' =>$clave,
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
					':pago' =>$pago,
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>VENTAS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_venta" value="<?php if($resultado) echo $resultado['id_venta']; ?>" class="input__text">
				<input type="text" name="id_paquete" value="<?php if($resultado) echo $resultado['id_paquete']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="clave" value="<?php if($resultado) echo $resultado['clave']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="adultos" value="<?php if($resultado) echo $resultado['adultos']; ?>" class="input__text">
				<input type="text" name="menores" value="<?php if($resultado) echo $resultado['menores']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="edad_menores" value="<?php if($resultado) echo $resultado['edad_menores']; ?>" class="input__text">
				<input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="pago" value="<?php if($resultado) echo $resultado['pago']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
