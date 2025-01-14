<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../Vista/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?></h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
