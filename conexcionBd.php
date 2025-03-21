<?php
$host = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

try {
    $conexDB = new mysqli($host, $userDB, $pwdDB, $nameDB);
    if ($conexDB->connect_error) {
        throw new Exception("Error de conexión: " . $conexDB->connect_error);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
?>