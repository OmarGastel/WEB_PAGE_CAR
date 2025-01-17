<?php
require_once "Conexion.php"; // Asegúrate de incluir tu archivo de conexión

class Vehiculo {
    public $conexion;

    public function __construct() {
        $this->conexion = Conexion::conectar(); // Método estático que conecta a la base de datos
    }

    public function registrar($marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto) {
        $query = $this->conexion->prepare("INSERT INTO vehiculos (marca, modelo, anio, transmision, cilindraje, kilometraje, motor, foto) 
                                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssisidss", $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto);
        
        if ($query->execute()) {
            return true;
        } else {
            return false; // O puedes devolver el error con $query->error
        }
    }

    public function obtenerTodos() {
        $result = $this->conexion->query("SELECT * FROM vehiculos");
        
        if ($result) {
            return $result;
        } else {
            return false; // O manejar el error aquí
        }
    }

    public function obtenerPorID($id) {
        $query = $this->conexion->prepare("SELECT * FROM vehiculos WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        
        $result = $query->get_result();
        if ($result && $result->num_rows > 0) {
            return $result->fetch_object();
        } else {
            return false; // Si no se encuentra el vehículo
        }
    }

    public function actualizar($id, $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto = null) {
        if ($foto) {
            $query = $this->conexion->prepare("UPDATE vehiculos SET marca = ?, modelo = ?, anio = ?, transmision = ?, cilindraje = ?, kilometraje = ?, motor = ?, foto = ? WHERE id = ?");
            $query->bind_param("ssisidssi", $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto, $id);
        } else {
            $query = $this->conexion->prepare("UPDATE vehiculos SET marca = ?, modelo = ?, anio = ?, transmision = ?, cilindraje = ?, kilometraje = ?, motor = ? WHERE id = ?");
            $query->bind_param("ssisidsi", $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $id);
        }
        
        if ($query->execute()) {
            return true;
        } else {
            return false; // O manejar el error con $query->error
        }
    }

    public function eliminar($id) {
        $query = $this->conexion->prepare("DELETE FROM vehiculos WHERE id = ?");
        $query->bind_param("i", $id);
        
        if ($query->execute()) {
            return true;
        } else {
            return false; // O manejar el error con $query->error
        }
    }
    
}
?>
