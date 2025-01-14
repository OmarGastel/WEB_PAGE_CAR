<?php
class Usuario
{
    private $conexion;

    // Constructor que recibe la conexión y la asigna a la propiedad $conexion
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    // Método para iniciar sesión
    public function login($email, $password)
    {
        // Preparar la consulta SQL
        $stmt = $this->conexion->prepare("SELECT password FROM usuarios WHERE email = ?");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $this->conexion->error);
        }

        // Enlazar parámetros
        $stmt->bind_param("s", $email);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si se encontró un registro que coincida
        if ($resultado->num_rows === 1) {
            $fila = $resultado->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($password, $fila['password'])) {
                return true; // Contraseña correcta
            }
        }

        return false; // Credenciales incorrectas
    }

    public function registrar($nombre, $email, $password)
    {
        // Hashear la contraseña antes de guardarla
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta SQL
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $passwordHash);

        // Ejecutar la consulta y retornar el resultado
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>