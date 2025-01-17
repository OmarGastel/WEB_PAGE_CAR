<?php
require_once "../Modelo/Vehiculo.php";

// Inicializa el modelo
$vehiculoModel = new Vehiculo();

// Obtiene el ID desde la URL
$id = $_GET['id'] ?? null;

// Si no hay ID, muestra un error
if (!$id) {
    die("ID no proporcionado.");
}

// Obtiene los datos del vehículo por ID
$vehiculo = $vehiculoModel->obtenerPorId($id);

// Si no se encuentra el vehículo, muestra un error
if (!$vehiculo) {
    die("Vehículo no encontrado.");
}

// Si el formulario es enviado, realiza la actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $anio = $_POST['anio'] ?? '';
    $transmision = $_POST['transmision'] ?? '';
    $cilindraje = $_POST['cilindraje'] ?? '';
    $kilometraje = $_POST['kilometraje'] ?? '';
    $motor = $_POST['motor'] ?? '';
    $foto = null;

    // Maneja la subida de una nueva foto
    if (!empty($_FILES['foto']['tmp_name'])) {
        $foto = 'Archivo/' . basename($_FILES['foto']['name']);
        move_uploaded_file($_FILES['foto']['tmp_name'], "../" . $foto);
    }

    // Actualiza los datos del vehículo
    if ($vehiculoModel->actualizar($id, $marca, $modelo, $anio, $transmision, $cilindraje, $kilometraje, $motor, $foto)) {
        echo "<script>alert('Vehículo actualizado correctamente'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el vehículo');</script>";
    }
}
