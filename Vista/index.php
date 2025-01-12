<?php
require_once __DIR__ . '/../Modelo/ImagenModel.php';

// Obtener imágenes del modelo
$imagenModel = new ImagenModel();
$imagenes = $imagenModel->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            object-fit: cover;
            height: 400px;
        }
    </style>
</head>

<body>
    <header class="text-center py-3 bg-dark text-white">
        <h1>Bienvenido a Autocar</h1>
        <p>Explora nuestros vehículos destacados</p>
    </header>

    <!-- Slider -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($imagenes as $index => $imagen): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="../<?php echo htmlspecialchars($imagen->foto); ?>" class="d-block w-100" alt="Imagen">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo htmlspecialchars($imagen->description); ?></h5>
                        <p><?php echo number_format($imagen->price, 2); ?> €</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <!-- Botón para ir al CRUD -->
    <div class="text-center my-5">
        <a href="crud.php" class="btn btn-success btn-lg">Ir al Panel de Administración (CRUD)</a>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
