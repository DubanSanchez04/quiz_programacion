<?php
include 'conexcionBd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    if ($id) {
        $stmt = $conexDB->prepare("UPDATE usuarios SET nombre = ?, edad = ? WHERE id = ?");
        $stmt->bind_param("sii", $nombre, $edad, $id);
    } else {
        $stmt = $conexDB->prepare("INSERT INTO usuarios (nombre, edad) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $edad);
    }
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
} elseif (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $conexDB->prepare("DELETE FROM personas WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>