<?php
	include_once '../conexion.php';

	if(isset($_GET['id_lead'])){
		$id_lead=(int) $_GET['id_lead'];

		$buscar_id=$con->prepare('SELECT * FROM leads WHERE id_lead=:id_lead LIMIT 1');
		$buscar_id->execute(array(
			':id_lead'=>$id_lead
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$id_lead=$_POST['id_lead'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		$numero=$_POST['numero'];
		$id_lead=(int) $_GET['id_lead'];

		if(!empty($id_lead) && !empty($nombre) && !empty($apellido) && !empty($correo) && !empty($numero) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE leads SET  
					id_lead=:id_lead,
					nombre=:nombre,
					apellido=:apellido,
					correo=:correo,
					numero=:numero
					WHERE id_lead=:id_lead;'
				);
				$consulta_update->execute(array(
					':id_lead' =>$id_lead,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correo' =>$correo,
					':numero' =>$numero,
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
	<title>Editar Lead</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_lead" value="<?php if($resultado) echo $resultado['id_lead']; ?>" class="input__text">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
				<input type="text" name="correo" value="<?php if($resultado) echo $resultado['correo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero" value="<?php if($resultado) echo $resultado['numero']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
