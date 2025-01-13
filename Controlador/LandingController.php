<?php
require_once __DIR__ . '/../Modelo/Conexion.php';

class LandingController
{
    public function getImages(): array
{
    $conexion = Conexion::conectar();
    $result = $conexion->query("SELECT id_img, foto, description, price FROM img");
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
    return $images;
}
}

?>
