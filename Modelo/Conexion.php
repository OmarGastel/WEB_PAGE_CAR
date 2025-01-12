<?php
class Conexion {
    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "crud_img", "3306");
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }
        $conexion->set_charset("utf8");
        date_default_timezone_set("America/Mexico_City");
        return $conexion;
    }
}
?>
