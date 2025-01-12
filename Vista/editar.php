<?php
require_once "../Modelo/ImagenModel.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID no proporcionado.");
}

$imagenModel = new ImagenModel();
$imagen = $imagenModel->obtenerImagenPorID($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../Controlador/ImagenController.php";
    $controller = new ImagenController();
    $controller->editar();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Imagen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Imagen</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $imagen->id_img ?>">
            <div class="mb-3">
                <label for="imagen" class="form-label">Nueva Imagen (opcional)</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $imagen->description ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= $imagen->price ?>" required>
            </div>
            <button type="submit" name="btnactualizar" class="btn btn-primary">Actualizar</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>
