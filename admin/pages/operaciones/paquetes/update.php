<?php
	include_once '../conexion.php';

	if(isset($_GET['id_paquete'])){
		$id_paquete=(int) $_GET['id_paquete'];

		$buscar_id=$con->prepare('SELECT * FROM paquetes WHERE id_paquete =: id_paquete LIMIT 1');
		$buscar_id->execute(array(
			':id_paquete' => $id_paquete
		));
		$resultado = $buscar_id->fetch();
	}else{
		header('Location: index.php');
	}

	if(isset($_POST['guardar'])){
		$id_paquete=$_POST['id_paquete'];
		$clave=$_POST['clave'];
		$salida=$_POST['salida'];
		$destino=$_POST['destino'];
		$descripcion=$_POST['descripcion'];
		$paquete=$_POST['paquete'];
		$precio=$_POST['precio'];
		$personas=$_POST['personas'];
		$disponibilidad=$_POST['disponibilidad'];
		$status=$_POST['status'];
		$tipo=$_POST['tipo'];
		$vencimiento=$_POST['vencimiento'];
		$id_usuario=(int) $_GET['id_usuario'];

		if(!empty($id_paquete) && !empty($clave) && !empty($salida) && !empty($destino) && !empty($descripcion)  && !empty($paquete)  && !empty($precio)  && !empty($personas) && !empty($disponibilidad) && !empty($status) && !empty($tipo) && !empty($vencimiento)){
				$consulta_update=$con->prepare(' UPDATE usuario SET  
				id_paquete =: id_paquete,
				clave =: clave,
				salida =: salida,
				destino =: destino,
				descripcion =: descripcion,
				paquete =: paquete,
				precio =: precio,
				personas =: personas,
				disponibilidad =: disponibilidad,
				status =: status,
				tipo =: tipo,
				vencimiento =: vencimiento
				WHERE id_usuario =: id_usuario;'
			);
			$consulta_update->execute(array(
				':id_paquete' =>$id_paquete,
				':clave' =>$clave,
				':contrasena' =>$contrasena,
				':salida' =>$salida,
				':destino' =>$destino,
				':descripcion' =>$descripcion,
				':paquete' =>$paquete,
				':precio' =>$precio,
				':personas' =>$personas,
				':disponibilidad' =>$disponibilidad,
				':status' =>$status,
				':tipo' =>$tipo,
				':vencimiento' =>$vencimiento,
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
	<title>Editar Paquete</title>
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>USUARIOS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_paquete" value="<?php if($resultado) echo $resultado['id_paquete']; ?>" class="input__text">
				<input type="text" name="clave" value="<?php if($resultado) echo $resultado['clave']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="salida" value="<?php if($resultado) echo $resultado['salida']; ?>" class="input__text">
				<input type="text" name="destino" value="<?php if($resultado) echo $resultado['destino']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="descripcion" value="<?php if($resultado) echo $resultado['descripcion']; ?>" class="input__text">
				<input type="text" name="paquete" value="<?php if($resultado) echo $resultado['paquete']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">
				<input type="text" name="personas" value="<?php if($resultado) echo $resultado['personas']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="disponibilidad" value="<?php if($resultado) echo $resultado['disponibilidad']; ?>" class="input__text">
				<input type="text" name="status" value="<?php if($resultado) echo $resultado['status']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="input__text">
				<input type="text" name="vencimiento" value="<?php if($resultado) echo $resultado['vencimiento']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
