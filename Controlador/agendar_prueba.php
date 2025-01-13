<?php
require_once __DIR__ . '/../Modelo/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $autoId = $_POST['auto_id'];

    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("INSERT INTO pruebas (nombre, apellido, telefono, auto_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nombre, $apellido, $telefono, $autoId);

    if ($stmt->execute()) {
        header("Location: index.php?success=1");
    } else {
        header("Location: index.php?error=1");
    }

    $stmt->close();
    $conexion->close();
}
?>
