<?php
require_once __DIR__ . '/../Controlador/DetalleController.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $controller = new DetalleController();
    $auto = $controller->getAutoById($id);

    if (!$auto) {
        die("El auto con ID $id no fue encontrado.");
    }
} else {
    die("ID del auto no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo htmlspecialchars($auto['description']); ?></h1>
        <img src="/WEB_PAGE_CAR/<?php echo htmlspecialchars($auto['foto']); ?>" class="img-fluid" alt="Auto">
        <p>Precio: $<?php echo number_format($auto['price'], 2); ?></p>
        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
