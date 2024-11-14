<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if ($password1 === $password2 && preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $password1)) {
        $password_hash = password_hash($password1, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, 'usuario')");
        $stmt->bind_param("sss", $nombre, $correo, $password_hash);
        
        if ($stmt->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Las contraseñas no cumplen los requisitos o no coinciden.";
    }
}
$conn->close();
?>
