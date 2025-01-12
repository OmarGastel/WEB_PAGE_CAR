<?php
require_once __DIR__ . '/../conexion.php';

class LandingController
{
    public function getImages()
    {
        global $conexion;
        $result = $conexion->query("SELECT foto, description FROM img");
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row;
        }
        return $images;
    }
}
?>
