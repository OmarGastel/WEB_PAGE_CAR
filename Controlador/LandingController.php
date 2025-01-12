<?php
require_once __DIR__ . '/../Modelo/Conexion.php';

class LandingController
{
    public function getImages()
    {
        // Usar la clase Conexion para obtener la conexión
        $conexion = Conexion::conectar();
        $result = $conexion->query("SELECT foto, description FROM img");

        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }
        return $images;
    }
}
?>
