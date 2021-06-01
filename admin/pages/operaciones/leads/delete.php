<?php 
	include_once '../conexion.php';
	if(isset($_GET['id_lead'])){
		$id_lead=(int) $_GET['id_lead'];
		$delete=$con->prepare('DELETE FROM leads WHERE id_lead=:id_lead');
		$delete->execute(array(
			':id_lead'=>$id_lead
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
?>