<?php
include 'conexcionBd.php';

$id = $nombre = $edad = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexDB->prepare("SELECT * FROM personas WHERE id = ?");
    if ($stmt === false) {
        die("Error en la consulta: " . $conexDB->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $nombre = $row['nombre'];
        $edad = $row['edad'];
    }
    $stmt->close();
}

include 'formulario.php';
?>