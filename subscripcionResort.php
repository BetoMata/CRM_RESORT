<?php
	$nombreDato=$_POST['nombreDato'];
	$apellidoDato=$_POST['apellidoDato'];
	$correoDato=$_POST['correoDato'];
	$numeroDato=$_POST['numeroDato'];

	$numeroDato = str_replace(" ", "", $numeroDato); //Eliminamos los espacios en blanco

	Print("Nombre: ".$nombreDato."<br>");
	Print("Apellido: ".$apellidoDato."<br>");
	Print("Correo: ".$correoDato."<br>");
	Print("Numero: ".$numeroDato."<br>");
	Print("Recibiras más información muy pronto."."<br>");
include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO leads VALUES (default, '$nombreDato','$apellidoDato', '$correoDato', '$numeroDato');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);

?>