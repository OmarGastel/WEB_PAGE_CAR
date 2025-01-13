<?php
require_once __DIR__ . '/../Controlador/LandingController.php';

// Instancia el controlador
$controller = new LandingController();

// Obtener imágenes y autos disponibles
$imagenes = $controller->getImages(); // Para el slider
$autos = $controller->getImages(); // Reutilizamos el mismo método para la sección de autos
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            object-fit: cover;
            height: 400px;
        }
    </style>
</head>

<body>
    <script src="../public/agendarPrueba.js"></script>
    <header class="text-center py-3 bg-dark text-white">
        <h1>Bienvenido a Autocar</h1>
        <p>Explora nuestros vehículos destacados</p>
    </header>


    <!-- Slider -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        $isFirst = true;
        foreach ($imagenes as $imagen): ?>
            <div class="carousel-item <?= $isFirst ? 'active' : ''; ?>">
                <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($imagen['foto']); ?>" class="d-block w-100" alt="Imagen">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <?php $isFirst = false; ?>
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
    <!-- Sección de Cards de Autos -->
    <section class="container my-5">
        <h2 class="text-center mb-4">Autos Disponibles</h2>
        <div class="row">
            <?php foreach ($autos as $auto): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($auto['foto']); ?>" class="card-img-top" alt="Auto">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($auto['description']); ?></h5>
                            <p class="card-text">Precio: $<?= number_format($auto['price'], 2); ?></p>
                            <button class="btn btn-primary btn-agendar" data-id="<?= $auto['id_img']; ?>"
                                data-descripcion="<?= htmlspecialchars($auto['description']); ?>">
                                Agendar Prueba
                            </button>
                            <a href="detalle_auto.php?id=<?= $auto['id_img']; ?>" class="btn btn-secondary">Ver Más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Modal para Agendar Prueba -->
    <div class="modal fade" id="modalAgendarPrueba" tabindex="-1" aria-labelledby="modalAgendarPruebaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAgendarPrueba" action="agendar_prueba.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgendarPruebaLabel">Agendar Prueba</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="auto_id" id="autoId">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono de Contacto</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="auto" class="form-label">Auto Seleccionado</label>
                            <input type="text" class="form-control" id="autoDescripcion" name="auto_descripcion"
                                readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Agendar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Botón para ir al CRUD -->
    <div class="text-center my-5">
        <a href="crud.php" class="btn btn-success btn-lg">Ir al Panel de Administración (CRUD)</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>