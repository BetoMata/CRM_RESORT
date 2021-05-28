<?php
	$idDato=$_POST['idDato'];
	$nombreDato=$_POST['nombreDato'];
	$apellidoDato=$_POST['apellidoDato'];
	$telefonoDato=$_POST['telefonoDato'];
	$correoDato=$_POST['correoDato'];
	$usernameDato=$_POST['usernameDato'];
	$contrasenaDato=$_POST['contrasenaDato'];
	$conf_contrasenaDato=$_POST['conf_contrasenaDato'];
	
	Print("ID: ".$idDato."<br>");
	Print("Nombre: ".$nombreDato."<br>");
	Print("Apellido: ".$apellidoDato."<br>");
	Print("Teléfono: ".$telefonoDato."<br>");
	Print("Correo: ".$correoDato."<br>");
	Print("Username: ".$usernameDato."<br>");
	Print("Contraseña: ".$contrasenaDato."<br>");
	Print("Tu información está registrada."."<br>");
include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO usuario VALUES ('$idDato', '$usernameDato', '$contrasenaDato', '$nombreDato', '$apellidoDato', '$telefonoDato', '$correoDato', '1', 'usuario');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);

?>