<?php
require_once __DIR__ . '/../Modelo/Conexion.php';

class DetalleController
{
    public function getAutoById(int $id): ?array
    {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT id_img, foto, description, price FROM img WHERE id_img = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($auto = $result->fetch_assoc()) {
            return $auto;
        }
        return null;
    }
}
?>
