<?php
require_once "Conexion.php";

class ImagenModel {
    private $db;

    public function __construct() {
        $this->db = Conexion::conectar();
    }

    // Registrar una nueva imagen
    public function registrarImagen($foto, $descripcion, $precio) {
        $stmt = $this->db->prepare("INSERT INTO img (foto, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $foto, $descripcion, $precio);
        $resultado = $stmt->execute();
        $stmt->close(); // Cierra el statement
        return $resultado;
    }

    // Obtener el último ID insertado
    public function obtenerUltimoID() {
        return $this->db->insert_id;
    }

    // Actualizar la ruta de una imagen
    public function actualizarRutaImagen($id, $ruta) {
        $stmt = $this->db->prepare("UPDATE img SET foto = ? WHERE id_img = ?");
        $stmt->bind_param("si", $ruta, $id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    // Actualizar una imagen (con o sin ruta)
    public function actualizarImagen($id, $descripcion, $precio, $ruta = null) {
        if ($ruta) {
            $stmt = $this->db->prepare("UPDATE img SET description = ?, price = ?, foto = ? WHERE id_img = ?");
            $stmt->bind_param("sdsi", $descripcion, $precio, $ruta, $id);
        } else {
            $stmt = $this->db->prepare("UPDATE img SET description = ?, price = ? WHERE id_img = ?");
            $stmt->bind_param("sdi", $descripcion, $precio, $id);
        }
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }

    // Obtener una imagen por su ID
    public function obtenerImagenPorID($id) {
        $stmt = $this->db->prepare("SELECT * FROM img WHERE id_img = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_object();
        $stmt->close();
        return $resultado ?: null; // Retorna null si no encuentra el registro
    }

    // Obtener todas las imágenes
    public function obtenerTodos(): bool|mysqli_result {
        $result = $this->db->query("SELECT * FROM img");
        return $result; // Devuelve el resultado directamente
    }

    public function eliminar($id) {
        $stmt = $this->db->prepare("DELETE FROM img WHERE id_img = ?");
        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();
        return $resultado;
    }
}
?>
