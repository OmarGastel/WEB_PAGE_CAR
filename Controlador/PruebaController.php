<?php
require_once "../Modelo/PruebaModel.php";

class PruebaController
{
    public $pruebaModel;

    public function __construct()
    {
        $this->pruebaModel = new Prueba();
    }

    public function obtenerPruebas()
    {
        return $this->pruebaModel->obtenerTodos();
    }

    public function registrarPrueba($auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba)
    {
        return $this->pruebaModel->registrar($auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba);
    }

    public function obtenerPruebaPorId($id)
    {
        return $this->pruebaModel->obtenerPorId($id);
    }

    public function actualizarPrueba($id, $auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba)
    {
        return $this->pruebaModel->actualizar($id, $auto_id, $nombre, $apellido, $telefono, $auto_seleccionado, $fecha_prueba);
    }

    public function eliminarPrueba($id)
    {
        return $this->pruebaModel->eliminar($id);
    }
}
?>
