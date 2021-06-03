<?php 
	include_once '../conexion.php';
	
	if(isset($_GET['id_usuario']))
	{
		$id_usuario=(int) $_GET['id_usuario'];
		$delete= $con -> prepare('DELETE FROM usuarios WHERE id_usuario =:id_usuario');
		$delete-> execute(array(
			'id_usuario' => $id_usuario,
		));
		header('Location: index.php');
	}
	else
	{
		header('Location: index.php');
	}
?>
