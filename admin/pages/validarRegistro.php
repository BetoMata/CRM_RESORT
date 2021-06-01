<?php
	$usuario=$_POST['username'];
	$nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];
    $numero=$_POST['numero'];
	
	include("ControladorBD.php");

	$Con = conectar();
	$SQL = "INSERT INTO usuario VALUES ('$usuario', '$contrasena', '$nombre', '$apellido', '$numero', '$correo, , 'admin');";
	$Cons = consultar($Con,$SQL);
	cerrar($Con);
?>