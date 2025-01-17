<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../public/registroo.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>
        <form action="../Controlador/RegistroController.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="btnRegistrar">Registrar</button>
        </form>
    </div>
</body>
</html>
