<?php
	include_once '../conexion.php';

	$sentencia_select=$con->prepare('SELECT * FROM leads ORDER BY id_lead DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT * FROM leads WHERE nombre LIKE :campo OR apellido LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>TABLA DE LEADS</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Correo</td>
				<td>Numero</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_lead']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellido']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['numero']; ?></td>
					<td><a href="update.php?id_lead=<?php echo $fila['id_lead']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_lead=<?php echo $fila['id_lead']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

				<script src="../../../js/confirmacion.js"></script>

</body>
</html>