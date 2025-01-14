<?php
// Incluir los archivos necesarios
require_once __DIR__ . '/../Modelo/Conexion.php';
require_once __DIR__ . '/../Modelo/Usuario.php';

// Conectar a la base de datos
$conexion = Conexion::conectar();

if (isset($_POST['btnRegistrar'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = new Usuario($conexion);
    if ($usuario->registrar($nombre, $email, $password)) {
        header("Location: ../Vista/login.php?registro=exitoso");
        exit;
    } else {
        echo "Error al registrar al usuario.";
    }
}
?>
