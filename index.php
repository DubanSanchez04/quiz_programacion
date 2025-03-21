<?php

include 'conexcionBd.php';


$result = $conexDB->query("SELECT id, nombre, edad, IF(edad >= 18, 'Sí', 'No') AS mayor_edad FROM personas");


$usuarios = $result->fetch_all(MYSQLI_ASSOC);


$conexDB->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <a href="formulario.php">Agregar Usuario</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Mayor de Edad</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $row) { ?>
        <tr>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['edad'] ?></td>
            <td><?= $row['mayor_edad'] ?></td>
            <td>
                <a href="formulario.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="procesar.php?eliminar=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>