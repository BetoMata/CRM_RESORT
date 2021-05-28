<?php 
	session_start();
	$FUsuario=$_REQUEST['usuarioDato'];
	$FPassword=$_REQUEST['contrasenaDato'];
	include("ControladorBD.php");

	$Con = conectar();
	$SQL = "SELECT * FROM usuario WHERE username='$FUsuario';";
	$Resultado = consultar($Con,$SQL);
	$n=mysqli_num_rows($Resultado);
	if($n==0){
		print("El Usuario no existe.");
	}else{
		$fila=mysqli_fetch_row($Resultado);
		if($FPassword==$fila[2]){
			if($fila[7]==1){
					if($fila[7]==0){
						print("Cuenta bloqueada");
					}else{
						print("Bienvenido");
					}
			}else{
				print("Su cuenta no esta activa");
			}
		}else{
			print("Contraseña Incorrecta");
			$SQL = "UPDATE  Cuentas SET intento=intento+1 WHERE username='$FUsuario';";
			consultar($Con,$SQL);
			if ($fila[5]>2) {
				$SQL = "UPDATE  Cuentas SET bloqueado=1 WHERE username='$FUsuario';";
				consultar($Con,$SQL);
			}
		}
	}
	cerrar($Con);
 ?>