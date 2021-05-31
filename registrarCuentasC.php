<?php
	$nombreDato=$_POST['nombreDato'];
	$apellidoDato=$_POST['apellidoDato'];
	$telefonoDato=$_POST['numeroDato'];
	$correoDato=$_POST['correoDato'];
	$usernameDato=$_POST['usernameDato'];
	$contrasenaDato=$_POST['claveDato'];
	$conf_contrasenaDato=$_POST['validaClave'];
	
	Print("Nombre: ".$nombreDato."<br>");
	Print("Apellido: ".$apellidoDato."<br>");
	Print("Teléfono: ".$telefonoDato."<br>");
	Print("Correo: ".$correoDato."<br>");
	Print("Username: ".$usernameDato."<br>");
	Print("Contraseña: ".$contrasenaDato."<br>");
	Print("Tu información está registrada."."<br>");
include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO cuentas_clientes VALUES (default, '$nombreDato', '$apellidoDato', '$telefonoDato', '$correoDato', '$usernameDato', '$contrasenaDato', '1');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);

?>