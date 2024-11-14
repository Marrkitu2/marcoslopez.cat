<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h2>Registro</h2>
    <form action="../controller/register_controller.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        
        <label for="password1">Contraseña:</label>
        <input type="password" id="password1" name="password1" required>
        
        <label for="password2">Confirmar Contraseña:</label>
        <input type="password" id="password2" name="password2" required>
        
        <button type="submit">Registrarse</button>
    </form>
    <a href="login_view.php">¿Ya tienes una cuenta? Inicia sesión</a>
</body>
</html>
