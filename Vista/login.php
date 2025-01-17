<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/login_stylee.css">
</head>
<body>
    <div class="container">
        <h1>Inicio de Sesión</h1>
        <form action="../Controlador/LoginController.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit" name="btnLogin">Iniciar Sesión</button>
        </form>
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Credenciales incorrectas. Inténtalo de nuevo.</p>
        <?php endif; ?>
    </div>
</body>
</html>
