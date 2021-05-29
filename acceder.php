<?php
	$usuarioDato=$_POST['usuario'];
	$claveDato=$_POST['clave'];
	
	Print("Nombre: ".$nombreDato."<br>");
	Print("Apellido: ".$apellidoDato."<br>");
	Print("Correo: ".$correoDato."<br>");
	Print("Numero: ".$numero."<br>");
	Print("Recibiras más información muy pronto."."<br>");
include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO leads VALUES ('$nombreDato', '$apellidoDato', '$correoDato', '$numeroDato');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);

?>