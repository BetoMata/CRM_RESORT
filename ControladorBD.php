<?php
	function  conectar (){
		$Resultado = parse_ini_file("ConfigBD.ini");
		$Server=$Resultado['Servidor'];
		$User=$Resultado['Usuario'];
		$Password=$Resultado['Password'];
		$BD=$Resultado['BD'];

		$Con = mysqli_connect($Server,$User,$Password,$BD);
		return $Con;
	}

	function consultar($Con, $SQL){		
		$Result= mysqli_query($Con,$SQL) Or die (mysqli_error($Con));
		return $Result;
	}

	function cerrar ($Con){
		mysqli_close($Con);
	}

?>