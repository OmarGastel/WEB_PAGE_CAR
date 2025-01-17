<?php
require_once "Conexion.php"; // Asegúrate de incluir tu archivo de conexión

class Vehiculo
{
    public $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::conectar(); // Método estático que conecta a la base de datos
    }

    public function registrar($marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto)
    {
        $query = $this->conexion->prepare("INSERT INTO vehiculos (marca, modelo, anio, transmision, cilindraje, kilometraje, motor, foto) 
                                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssisidss", $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto);
        return $query->execute();
    }

    public function obtenerTodos()
    {
        return $this->conexion->query("SELECT * FROM vehiculos");
    }

    public function obtenerPorId($id)
    {
        $query = "SELECT * FROM vehiculos WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id); // "i" para un entero
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_object(); // Devuelve el vehículo como objeto
        }
        return null; // Si no se encuentra el vehículo
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
    

    public function eliminar($id)
    {
        $query = $this->conexion->prepare("DELETE FROM vehiculos WHERE id = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }

    public function obtenerOtrosVehiculos()
    {
        return $this->conexion->query("SELECT * FROM vehiculos WHERE id NOT IN (SELECT id FROM vehiculos WHERE marca = 'Tesla')");
    }
}
