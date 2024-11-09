<?php
include 'db._connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña1 = $_POST['contraseña1'];
    $contraseña2 = $_POST['contraseña2'];

    if ($contraseña1 !== $contraseña2) {
        echo "Las contraseñas no son idénticas.";
        exit;
    }

    if (!preg_match('/[A-Z]/', $contraseña1) || !preg_match('/[0-9]/', $contraseña1) || strlen($contraseña1) < 8) {
        echo "La contraseña debe tener al menos una mayúscula, un número y ser de al menos 8 caracteres.";
        exit;
    }

    $contraseñaEncriptada = hash('sha256', $contraseña1);
    $query = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseñaEncriptada')";

    if (mysqli_query($conn, $query)) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar usuario.";
    }
}
?>
