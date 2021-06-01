<?php
    include("ControladorBD.php");

	$Con = conectar();

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    session_start();

    $_SESSION['usuario'] = $usuario;

    require "../../conexion.php";    
    $Con = conectar();
    $sql = "SELECT contrasena FROM usuarios WHERE correo='$correo'";

    $resultado = $mysqli_query($Con, $sql);
    
    $text = "La contrasena es";
    echo "<script>
                alert(".$text.$correo.");
    </script>";

    cerrar($Con);
?>