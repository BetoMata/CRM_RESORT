<?php
	$usuarioDato=$_POST['usuario'];
	$claveDato=$_POST['clave'];
	
	include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO leads VALUES ('$nombreDato', '$apellidoDato', '$correoDato', '$numeroDato');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);

?>