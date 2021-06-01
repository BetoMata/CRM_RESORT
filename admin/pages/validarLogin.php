<?php
    include("../../ControladorBD.php");

	$Con = conectar();

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $tipo = $_POST['tipo'];

    session_start();

    $_SESSION['usuario'] = $usuario;

    $Con = conectar();
    $sql = "SELECT username, contrasena, tipo FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena' and tipo = 'admin'";

    $resultado = $mysqli_query($Con, $sql);
    $num = mysqli_num_rows($resultado);

    if ($num > 0) {
        header("Location: dashboard.php");
    }
    else{
        echo "La contraseña o usuario no coincide";
    }
    
    cerrar($Con);
?>