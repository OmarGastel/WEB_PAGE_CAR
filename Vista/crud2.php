? <?php
require_once "../Modelo/ImagenModel.php";

$imagenModel = new ImagenModel();
$imagenes = $imagenModel->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD IMG</title>
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
    <a href="registrar_crud2.php" class="btn btn-primary mb-3">Registrar Imagen</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Foto</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $imagenes->fetch_object()) { ?>
                <tr>
                    <td><?= $row->id_img ?></td>
                    <td><img src="../<?= htmlspecialchars($row->foto) ?>" alt="Imagen" style="width:100px;"></td>
                    <td><?= htmlspecialchars(string: $row->description) ?></td>
                    <td><?= number_format($row->price, 2) ?> €</td>

                    <td>
                        <a href="editar.php?id=<?= $row->id_img ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../Controlador/EliminarController.php?id=<?= $row->id_img ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>