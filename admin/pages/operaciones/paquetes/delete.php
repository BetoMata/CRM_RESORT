<?php 
	include_once '../conexion.php';
	
	if(isset($_GET['id_paquete']))
	{
		$id_usuario=(int) $_GET['id_paquete'];
		$delete= $con -> prepare('DELETE FROM paquetes WHERE id_paquetes =: id_paquetes');
		$delete-> execute(array(
			':id_paquete' => $id_paquete,
		));
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
