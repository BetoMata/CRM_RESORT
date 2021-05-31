<?php
	$nombreDato=$_POST['nombreDato'];
	$apellidoDato=$_POST['apellidoDato'];
	$telefonoDato=$_POST['numeroDato'];
	$correoDato=$_POST['correoDato'];
	$usernameDato=$_POST['usernameDato'];
	$contrasenaDato=$_POST['claveDato'];
	$conf_contrasenaDato=$_POST['validaClave'];
	

include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO cuentas_clientes VALUES (default, '$nombreDato', '$apellidoDato', '$telefonoDato', '$correoDato', '$usernameDato', '$contrasenaDato', '1');";
	$Cons = consultar($Con,$SQL);

	
	
	
	
	
	//header('Location: catalogoResort.php');
	
	cerrar($Con);
	
?>

<script src="registrado.js"></script>







