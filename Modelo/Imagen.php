<?php
require_once "Conexion.php";

class Imagen {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar();
    }

    public function registrar($descripcion, $precio, $ruta) {
        $query = $this->conexion->prepare("INSERT INTO img (foto, description, price) VALUES (?, ?, ?)");
        $query->bind_param("ssd", $ruta, $descripcion, $precio);
        return $query->execute();
    }

    public function eliminar($id) {
        $query = $this->conexion->prepare("DELETE FROM img WHERE id_img = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    public function actualizar($id, $descripcion, $precio, $ruta = null) {
        if ($ruta) {
            $query = $this->conexion->prepare("UPDATE img SET description = ?, price = ?, foto = ? WHERE id_img = ?");
            $query->bind_param("sdsi", $descripcion, $precio, $ruta, $id);
        } else {
            $query = $this->conexion->prepare("UPDATE img SET description = ?, price = ? WHERE id_img = ?");
            $query->bind_param("sdi", $descripcion, $precio, $id);
        }
        return $query->execute();
    }

    public function obtenerTodos() {
        return $this->conexion->query("SELECT * FROM img");
    }
}
?>
