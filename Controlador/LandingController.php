<?php
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once "../Modelo/VehiculoModel.php";

class LandingController
{
    // Método para obtener imágenes (ya existente)
    public function getImages(): array
    {
        $conexion = Conexion::conectar();
        $result = $conexion->query(query: "SELECT id_img, foto, description, price FROM img");
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }
        return $images;
    }

    // Método para obtener los datos de los vehículos (nuevo)
    public function getVehiculos(): array
    {
        $conexion = Conexion::conectar();
        $result = $conexion->query("SELECT * FROM vehiculos");
        $vehiculos = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $vehiculos[] = $row;
            }
        }
        return $vehiculos;
    }
}
?>