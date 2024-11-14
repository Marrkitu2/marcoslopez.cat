<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "<h2>Bienvenido, " . $_SESSION['user_id'] . "</h2>";
    echo "<a href='vista/add_animal_view.php'>Añadir Animal</a>";
    echo "<a href='controller/logout.php'>Cerrar sesión</a>";
} else {
    echo "<a href='vista/login_view.php'>Iniciar Sesión</a>";
    echo "<a href='vista/register_view.php'>Registrarse</a>";
}
?>
