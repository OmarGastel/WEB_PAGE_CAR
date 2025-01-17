<?php require_once "../Controlador/EditarVehiculoController.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Vehículo</title>
</head>

<body>
    <h1>Editar Vehículo</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?= htmlspecialchars($vehiculo->marca ?? '') ?>" required><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?= htmlspecialchars($vehiculo->modelo ?? '') ?>" required><br>

        <label for="anio">Año:</label>
        <input type="number" id="anio" name="anio" value="<?= htmlspecialchars($vehiculo->anio ?? '') ?>" required><br>

        <label for="transmision">Transmisión:</label>
        <input type="text" id="transmision" name="transmision" value="<?= htmlspecialchars($vehiculo->transmision ?? '') ?>" required><br>

        <label for="cilindraje">Cilindraje:</label>
        <input type="number" step="0.1" id="cilindraje" name="cilindraje" value="<?= htmlspecialchars($vehiculo->cilindraje ?? '') ?>" required><br>

        <label for="kilometraje">Kilometraje:</label>
        <input type="number" id="kilometraje" name="kilometraje" value="<?= htmlspecialchars($vehiculo->kilometraje ?? '') ?>" required><br>

        <label for="motor">Motor:</label>
        <input type="text" id="motor" name="motor" value="<?= htmlspecialchars($vehiculo->motor ?? '') ?>" required><br>

        <label for="foto">Nueva Foto (opcional):</label>
        <input type="file" id="foto" name="foto"><br>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>
