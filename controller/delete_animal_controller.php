<?php
session_start();
include 'db_connection.php';

if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $animal_id = $_GET['id'];
    $usuario_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM animales WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $animal_id, $usuario_id);

    if ($stmt->execute()) {
        echo "Animal eliminado correctamente.";
    } else {
        echo "Error al eliminar el animal.";
    }
    $stmt->close();
}
$conn->close();
?>
