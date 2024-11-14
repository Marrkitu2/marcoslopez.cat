<?php
include 'db_connection.php';

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$query = "SELECT * FROM animales LIMIT $start, $limit";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<div class='animal'>";
    echo "<img src='../uploads/" . htmlspecialchars($row['foto']) . "' alt='Foto del animal'>";
    echo "<h2>" . htmlspecialchars($row['nombre']) . "</h2>";
    echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
    echo "</div>";
}

$total = $conn->query("SELECT COUNT(*) as total FROM animales")->fetch_assoc()['total'];
$pages = ceil($total / $limit);

for ($i = 1; $i <= $pages; $i++) {
    echo "<a href='index.php?page=$i'>$i</a> ";
}
$conn->close();
?>
