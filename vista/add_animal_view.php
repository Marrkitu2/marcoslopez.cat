<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Animal</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h2>Añadir Animal</h2>
    <form action="../controller/add_animal_controller.php" method="POST" enctype="multipart/form-data">
        <label for="nombre_animal">Nombre del Animal:</label>
        <input type="text" id="nombre_animal" name="nombre_animal" required>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>

        <label for="foto">Foto del Animal:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <button type="submit">Añadir Animal</button>
    </form>
    <a href="../index.php">Volver a la página principal</a>
</body>
</html>
