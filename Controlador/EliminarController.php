<?php
require_once "../Modelo/Vehiculo.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $vehiculoModel = new Vehiculo();

    if ($vehiculoModel->eliminar($id)) {
        echo "<script>alert('Vehículo eliminado correctamente'); window.location='../Vista/index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el vehículo'); window.location='../Vista/index.php';</script>";
    }
} else {
    echo "<script>alert('ID no proporcionado'); window.location='../Vista/index.php';</script>";
}
?>