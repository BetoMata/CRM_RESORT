<?php 
	include_once '../conexion.php';
	
	if(isset($_POST['guardar'])){
		$id_lead=$_POST['id_lead'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$correo=$_POST['correo'];
		$numero=$_POST['numero'];

		if(!empty($id_lead) && !empty($nombre) && !empty($apellido) && !empty($correo) && !empty($numero) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO leads (id_lead,nombre,apellido,correo,numero) VALUES(:id_lead,:nombre,:apellido,:correo,:numero)');
				$consulta_insert->execute(array(
					':id_lead' =>$id_lead,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':correo' =>$correo,
					':numero' =>$numero
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
		<h2>TABLA DE LEADS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id_lead" placeholder="ID" class="input__text">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido" placeholder="Apellido" class="input__text">
				<input type="email" name="correo" placeholder="Correo" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numero" placeholder="Numero" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
