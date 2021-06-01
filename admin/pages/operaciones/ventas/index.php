<?php
	include_once '../conexion.php';

	$sentencia_select = $con -> prepare('SELECT * FROM ventas ORDER BY id_venta DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	//Metodo buscar
	if(isset($_POST['btn_buscar']))
	{
		$buscar_text=$_POST['buscar'];
		
		$select_buscar=$con->prepare('
			SELECT * FROM ventas WHERE nombre LIKE :campo OR correo LIKE :campo;'
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
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>VENTAS DEL SISTEMA</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="Buscar nombre o correo" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id Venta</td>
				<td>Id Paquete</td>
				<td>Clave</td>
				<td>Fecha Salida</td>
				<td>Fecha Llegada</td>
				<td>Fecha Compra</td>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Telefono</td>
				<td>Adultos</td>
				<td>Menores</td>
				<td>Precio</td>
				<td>Pago</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_venta']; ?></td>
					<td><?php echo $fila['id_paqueta']; ?></td>
					<td><?php echo $fila['clave']; ?></td>
					<td><?php echo $fila['fecha_salida']; ?></td>
					<td><?php echo $fila['fecha_llegada']; ?></td>
					<td><?php echo $fila['fecha_compra']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['correo']; ?></td>
					<td><?php echo $fila['telefono']; ?></td>
					<td><?php echo $fila['adultos']; ?></td>
					<td><?php echo $fila['menores']; ?></td>
					<td><?php echo $fila['edad_menores']; ?></td>
					<td><?php echo $fila['precio']; ?></td>
					<td><?php echo $fila['pago']; ?></td>
					<td><a href="update.php?id_venta=<?php echo $fila['id_venta']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id_venta=<?php echo $fila['id_venta']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>