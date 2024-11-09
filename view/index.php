<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Animales</title>
</head>
<body>
    <nav>
        <a href="index.php">Vista de Animales</a>
        <?php if ($loggedIn): ?>
            <a href="mis_animales.php">Mis Animales</a>
            <a href="logout.php">Cerrar Sesión</a>
        <?php else: ?>
            <a href="login.html">Logearse</a>
            <a href="registrarse.html">Registrarse</a>
        <?php endif; ?>
    </nav>

    <h1>Vista de Animales</h1>
    <?php
    // Conexión a la base de datos y consulta de todos los animales
    include '../controller/db._connection.php';
    $query = "SELECT * FROM animales";
    $result = mysqli_query($conn, $query);
    while ($animal = mysqli_fetch_assoc($result)) {
        echo "<div><h2>{$animal['nombre']}</h2><p>{$animal['descripcion']}</p></div>";
    }
    ?>
</body>
</html>
