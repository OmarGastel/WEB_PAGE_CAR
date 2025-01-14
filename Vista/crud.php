<?php
require_once "../Modelo/VehiculoModel.php";
// Obtener todos los vehículos
$vehiculoModel = new Vehiculo();  // Usar el nombre correcto de la clase
$vehiculos = $vehiculoModel->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<header class="text-center py-3 bg-dark text-white">
    <div class="d-flex justify-content-between align-items-center container">
        <h1>Bienvenido a Autocar</h1>
        <a href="index.php" class="btn btn-primary">Inicio</a>
    </div>
    <p>Explora nuestros vehículos destacados</p>
</header>
<body>
    <h1 class="text-center text-secondary fw-bold p-4">PANEL DEL ADMINISTRADOR AUTOCAR</h1>
    <a href="registrar.php" class="btn btn-primary mb-3">Registrar Vehículo</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Transmisión</th>
                <th>Cilindraje</th>
                <th>Kilometraje</th>
                <th>Motor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $vehiculos->fetch_object()) { ?>
                <tr>
                    <td><?= $row->id ?></td>
                    <td><img src="../<?= htmlspecialchars($row->foto) ?>" alt="Vehículo" style="width:100px;"></td>
                    <td><?= htmlspecialchars($row->marca) ?></td>
                    <td><?= htmlspecialchars($row->modelo) ?></td>
                    <td><?= $row->anio ?></td>
                    <td><?= htmlspecialchars($row->transmision) ?></td>
                    <td><?= number_format($row->cilindraje, 2) ?></td>
                    <td><?= number_format($row->kilometraje, 2) ?> km</td>
                    <td><?= htmlspecialchars($row->motor) ?></td>

                    <td>
                        <a href="editar.php?id=<?= $row->id_vehiculo ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../Controlador/EliminarController.php?id=<?= $row->id_vehiculo ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
