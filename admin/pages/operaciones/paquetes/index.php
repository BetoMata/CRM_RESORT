<?php
	include_once '../conexion.php';

	$sentencia_select = $con -> prepare('SELECT * FROM paquetes ORDER BY id_paquete DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	//Metodo buscar
	if(isset($_POST['btn_buscar']))
	{
		$buscar_text=$_POST['buscar'];
		
		$select_buscar=$con->prepare('
			SELECT * FROM paquetes WHERE destino LIKE :campo OR paquete LIKE :campo;'
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
		<h2>PAQUETES DEL SISTEMA</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar destino o paquete" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Clave</td>
				<td>Salida</td>
				<td>Destino</td>
				<td>Descripción</td>
				<td>Paquete</td>
				<td>Precio</td>
				<td>Dias</td>
				<td>Disp</td>
				<td>Status</td>
				<td>Tipo</td>
				<td>Venc</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_paquete']; ?></td>
					<td><?php echo $fila['clave']; ?></td>
					<td><?php echo $fila['salida']; ?></td>
					<td><?php echo $fila['destino']; ?></td>
					<td><?php echo $fila['descripcion']; ?></td>
					<td><?php echo $fila['paquete']; ?></td>
					<td><?php echo $fila['precio']; ?></td>
					<td><?php echo $fila['dias']; ?></td>
					<td><?php echo $fila['disponibilidad']; ?></td>
					<td><?php echo $fila['status']; ?></td>
					<td><?php echo $fila['tipo']; ?></td>
					<td><?php echo $fila['vencimiento']; ?></td>
					<td><a href="update.php?id_paquete=<?php echo $fila['id_paquete']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_paquete=<?php echo $fila['id_paquete']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>

	<script src="../../../js/confirmacion.js"></script>

</body>
</html>