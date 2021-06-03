<?php 
	include_once '../conexion.php';
	
	if(isset($_GET['id_venta']))
	{
		$id_venta=(int) $_GET['id_venta'];
		$delete= $con -> prepare('DELETE FROM ventas WHERE id_venta =:id_venta');
		$delete-> execute(array(
			'id_venta' => $id_venta
		));
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
