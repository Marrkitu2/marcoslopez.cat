<?php
include('/controller/db_connection.php'); // Conexión a la base de datos
include('/controller/paginacion_animales.php'); // Controlador de paginación

// Consulta para obtener el número total de animales
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM animales");
$row = mysqli_fetch_assoc($result);
$total_animales = $row['total'];

// Definir el número máximo de animales por página y calcular el número total de páginas
$animales_por_pagina = 5;
$total_paginas = ceil($total_animales / $animales_por_pagina);

// Obtener el número de página actual (si no se define, se asume la página 1)
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $animales_por_pagina;

// Consulta para obtener los animales de la página actual
$query = "SELECT * FROM animales LIMIT $offset, $animales_por_pagina";
$animales = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Animales</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="navbar">
    <a href="index.php">Inicio</a>
    <a href="index_vista_individualAnimales.php">Mis animales</a>
</div>

<h1>Lista de Animales</h1>

<div class="animal-list">
    <?php while ($animal = mysqli_fetch_assoc($animales)): ?>
        <div class="animal">
            <h2><?php echo htmlspecialchars($animal['nombre']); ?></h2>
            <p><?php echo htmlspecialchars($animal['descripcion']); ?></p>
            <?php if ($animal['imagen']): ?>
                <img src="<?php echo htmlspecialchars($animal['imagen']); ?>" alt="<?php echo htmlspecialchars($animal['nombre']); ?>">
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</div>

<!-- Paginas de navegación -->
<div class="pagination">
    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
        <a href="index.php?pagina=<?php echo $i; ?>" class="<?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>
</div>

</body>
</html>

<?php
mysqli_close($conn); // Cerrar la conexión
?>
