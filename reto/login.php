<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $contrasenaEncriptada = md5($contrasena);

    $conexion = new mysqli("localhost", "root", "", "pagina");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $sql = "SELECT id, correo, contrasena FROM usuario WHERE correo = '$correo' AND contrasena = '$contrasenaEncriptada'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['usuario_id'] = $fila['id'];
        $_SESSION['correo'] = $fila['correo'];
        header("Location: pagina_privada.php");
        session_start();
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    $conexion->close();
}
?>

