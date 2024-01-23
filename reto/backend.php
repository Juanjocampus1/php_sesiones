<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $contrasenaEncriptada = md5($contrasena);

    $conexion = new mysqli("localhost", "root", "", "pagina");

    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    $sql = "INSERT INTO usuario (correo, contrasena) VALUES ('$correo', '$contrasenaEncriptada')";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro insertado correctamente.";

        // Redirige a la página de inicio de sesión después del registro
        header("Location: login.html");
        exit();
    } else {
        echo "Error al insertar el registro: " . $conexion->error;
    }

    $conexion->close();
}
?>
