<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autoId = $_POST['auto_id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $autoDescripcion = $_POST['auto_descripcion'] ?? '';

    // Validar campos
    if (!$autoId || !$nombre || !$apellido || !$telefono) {
        die("Faltan datos necesarios.");
    }

    // Conectar a la base de datos y guardar la prueba
    require_once __DIR__ . '/../Modelo/Conexion.php';
    $conexion = Conexion::conectar();

    $stmt = $conexion->prepare("INSERT INTO pruebas (auto_id, nombre, apellido, telefono, descripcion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $autoId, $nombre, $apellido, $telefono, $autoDescripcion);

    if ($stmt->execute()) {
        echo "Prueba agendada exitosamente.";
        header('Location: /WEB_PAGE_CAR/Vista/index.php'); // Redirige al usuario a la página principal (index.php)
        exit; // Asegúrate de llamar a exit() para evitar que el script siga ejecutándose después de la redirección
    } else {
        echo "Error al agendar la prueba.";
    }
    $stmt->close();
    $conexion->close();
} else {
    die("Acceso no válido.");
}
?>