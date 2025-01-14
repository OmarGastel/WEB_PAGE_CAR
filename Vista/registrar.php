<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../Controlador/ImagenController.php";
    $controller = new ImagenController();
    $controller->registrar();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registrar Imagen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Registrar Imagen</h1>
        <form action="procesarRegistroVehiculo.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="marca" placeholder="Marca" required>
            <input type="text" name="modelo" placeholder="Modelo" required>
            <input type="number" name="anio" placeholder="Año" required>
            <input type="text" name="transmision" placeholder="Transmisión" required>
            <input type="number" step="0.01" name="cilindraje" placeholder="Cilindraje" required>
            <input type="number" name="kilometraje" placeholder="Kilometraje" required>
            <input type="text" name="motor" placeholder="Motor" required>
            <input type="file" name="foto" required>
            <button type="submit">Registrar Vehículo</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>

</html>