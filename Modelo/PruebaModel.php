<?php
require_once "Conexion.php";

class Prueba
{
    public $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar();
    }

    public function registrar($auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba)
    {
        $query = $this->conexion->prepare("INSERT INTO pruebas_agendadas (auto_id, nombre, apellido, telefono, auto_seleccionado, fecha_prueba) 
                                           VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("isssss", $auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba);
        return $query->execute();
    }

    public function obtenerTodos()
    {
        return $this->conexion->query("SELECT * FROM pruebas_agendadas");
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM pruebas_agendadas WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_object();
        }
        return null;
    }

    public function actualizar($id, $auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba)
    {
        $query = $this->conexion->prepare("UPDATE pruebas_agendadas SET auto_id = ?, nombre = ?, apellido = ?, telefono = ?, auto_seleccionado = ?, fecha_prueba = ? WHERE id = ?");
        $query->bind_param("isssssi", $auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba, $id);
        return $query->execute();
    }

    public function eliminar($id)
    {
        $query = $this->conexion->prepare("DELETE FROM pruebas_agendadas WHERE id = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }
}
?>
