<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $nombre_animal = $_POST['nombre_animal'];
    $descripcion = $_POST['descripcion'];
    $usuario_id = $_SESSION['user_id'];

    $foto = $_FILES['foto']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($foto);
    
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO animales (nombre, descripcion, foto, usuario_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre_animal, $descripcion, $foto, $usuario_id);
        
        if ($stmt->execute()) {
            echo "Animal añadido con éxito.";
        } else {
            echo "Error al añadir animal.";
        }
        $stmt->close();
    } else {
        echo "Error al subir la imagen.";
    }
}
$conn->close();
?>
