<?php
session_start();
include 'db._connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && hash('sha256', $contraseña) === $user['contraseña']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['rol'];
        header("Location: index.php");
    } else {
        echo "Error: Usuario no registrado o contraseña incorrecta.";
    }
}
?>
