<?php
require_once "../Modelo/VehiculoModel.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = intval($_POST['anio']);
        $transmision = $_POST['transmision'];
        $cilindraje = floatval($_POST['cilindraje']);
        $kilometraje = intval($_POST['kilometraje']);
        $motor = $_POST['motor'];
        $foto = $_FILES['foto']['tmp_name'];
        $nombreFoto = $_FILES['foto']['name'];
        $tipoFoto = strtolower(pathinfo($nombreFoto, PATHINFO_EXTENSION));
        $directorio = __DIR__ . "/../Archivo/";

        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        if (!in_array($tipoFoto, ["jpg", "jpeg", "png"])) {
            throw new Exception("Formato de imagen no válido.");
        }

        $vehiculoModel = new Vehiculo();
        $registro = $vehiculoModel->registrar($marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, "");

        if ($registro) {
            $id = $vehiculoModel->conexion->insert_id;
            $rutaFoto = "Archivo/$id.$tipoFoto";
            move_uploaded_file($foto, $directorio . "$id.$tipoFoto");
            $vehiculoModel->actualizar($id, $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $rutaFoto);
            echo "<script>alert('Vehículo registrado con éxito'); window.location='../Vista/index.php';</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('{$e->getMessage()}'); window.history.back();</script>";
    }
}
