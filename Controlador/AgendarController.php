<?php
require_once __DIR__ . '/../Modelo/Conexion.php';

class AgendarController
{
    public function registrarPrueba(string $nombre, string $apellido, string $telefono, int $autoId): bool
    {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("INSERT INTO pruebas (nombre, apellido, telefono, auto_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre, $apellido, $telefono, $autoId);

        return $stmt->execute();
    }
}
?>
