<?php
// Incluir los archivos necesarios
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once __DIR__ . '/../Modelo/Usuario.php';

// Establecer la conexión
$conexion = Conexion::conectar();

// Verificar la conexión
if ($conexion === null) {
    die("Error: No se pudo establecer la conexión a la base de datos.");
}

// Crear una instancia del modelo Usuario
$usuario = new Usuario($conexion);

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($usuario->login($email, $password)) {
        // Inicio de sesión exitoso, redirigir a la página principal (index.php)
        header("Location: ../Vista/crud.php");
        exit;
    } else {
        // Redirigir al formulario con un mensaje de error
        header("Location: ../Vista/login.php?error=1");
        exit;
    }
} else {
    die("Acceso no válido.");
}
?>
