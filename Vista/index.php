<?php
// Incluye el controlador
require_once __DIR__ . '/../Controlador/LandingController.php';
require_once "../Modelo/VehiculoModel.php";

// Crea una instancia del controlador
$controller = new LandingController();

// Obtén los datos de las tablas a través del controlador
$imagenes = $controller->getImages(); // Para la sección de imágenes
$autos = $controller->getImages(); // PARA AUTOS DISPONIBLES
$vehiculos = $controller->getVehiculos(); // PARA VEHÍCULOS EN INVENTARIO



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocar | Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/custom.css">
</head>

<body style="font-family: 'Roboto', sans-serif; background-color: #141e30; color: #ffffff;">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="m-0">
                <a href="login.php" style="text-decoration: none; color: inherit;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/2560px-Mercedes-Logo.svg.png"
                        alt="Autocar" height="40">
                    Autocar
                </a>
            </h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="#slider">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#autos">Autos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#financiamiento">Financiamiento</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="slider" class="carousel slide" data-bs-ride="carousel" style="background-color: #243b55;">
        <div class="carousel-inner">
            <?php
            $isFirst = true;
            foreach ($imagenes as $imagen): ?>
                <div class="carousel-item <?= $isFirst ? 'active' : ''; ?>">
                    <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($imagen['foto']); ?>" class="d-block w-100" alt="Imagen"
                        style="max-height: 500px; object-fit: cover;">
                </div>
                <?php $isFirst = false; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Autos Disponibles -->
    <section id="vehiculos" class="container my-5">
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
    <div class="modal fade" id="modalAgendarPrueba" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAgendarPrueba" action="../Controlador/agendar_prueba.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Agendar Prueba</h5>
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

    <script src="../public/agendarPrueba.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Nueva Sección: Vehículos Disponibles -->
    <section id="vehiculos" class="container my-5">
        <h2 class="text-center mb-4">Vehículos en Inventario</h2>
        <div class="row">
            <?php foreach ($vehiculos as $vehiculo): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($vehiculo['foto']); ?>" class="card-img-top"
                            alt="<?= htmlspecialchars($vehiculo['marca']); ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= htmlspecialchars($vehiculo['marca']) . " " . htmlspecialchars($vehiculo['modelo']); ?>
                                (<?= htmlspecialchars($vehiculo['anio']); ?>)
                            </h5>
                            <p class="card-text">
                                Transmisión: <?= htmlspecialchars($vehiculo['transmision']); ?><br>
                                Motor: <?= htmlspecialchars($vehiculo['motor']); ?><br>
                                Cilindraje: <?= htmlspecialchars($vehiculo['cilindraje']); ?><br>
                                Kilometraje: <?= number_format($vehiculo['kilometraje'], 0); ?> km
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- Sección de Financiamiento -->
    <section id="financiamiento" class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="text-center mb-4">Opciones de Financiamiento</h2>
            <p class="text-center mb-5">
                Ofrecemos planes de financiamiento flexibles para que puedas adquirir el auto de tus sueños sin
                preocupaciones.
            </p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title">Plan Básico</h5>
                            <p class="card-text">Pagos mensuales desde <strong>$200</strong> USD.</p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check"></i> Interés bajo</li>
                                <li><i class="fas fa-check"></i> Plazo de 36 meses</li>
                                <li><i class="fas fa-check"></i> Sin penalización por pagos anticipados</li>
                            </ul>
                            <button class="btn btn-primary mt-3">Pregunte En Su Prueba De Manejo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title">Plan Premium</h5>
                            <p class="card-text">Pagos mensuales desde <strong>$350</strong> USD.</p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check"></i> Interés preferencial</li>
                                <li><i class="fas fa-check"></i> Plazo de 48 meses</li>
                                <li><i class="fas fa-check"></i> Seguro incluido</li>
                            </ul>
                            <button class="btn btn-primary mt-3">Pregunte En Su Prueba De Manejo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-secondary text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title">Plan Elite</h5>
                            <p class="card-text">Pagos mensuales desde <strong>$500</strong> USD.</p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check"></i> Interés mínimo</li>
                                <li><i class="fas fa-check"></i> Plazo de 60 meses</li>
                                <li><i class="fas fa-check"></i> Beneficios exclusivos</li>
                            </ul>
                            <button class="btn btn-primary mt-3">Pregunte En Su Prueba De Manejo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonios -->
    <section id="testimonios" class="bg-dark text-white py-5">
        <div class="container">
            <h2 class="text-center mb-4">Testimonios</h2>
            <div class="row">
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"¡Una experiencia increíble! Los autos son de primera calidad."</p>
                        <footer class="blockquote-footer">Juan Pérez</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"El proceso de agendar fue muy rápido y eficiente."</p>
                        <footer class="blockquote-footer">Ana Gómez</footer>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote class="blockquote">
                        <p>"Gran servicio y atención personalizada recomendado."</p>
                        <footer class="blockquote-footer">Carlos Martínez</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center my-5">
        <a href="crud.php" class="btn btn-success btn-lg">Ir al Panel de Administración (CRUD)</a>
        <a href="crud2.php" class="btn btn-success btn-lg">Administración caracteristicas (CRUD)</a>
        <a href="login.php" class="btn btn-success btn-lg">Login</a>
        <a href="registro.php" class="btn btn-success btn-lg">Registro</a>



        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>&copy; 2025 Autocar. Todos los derechos reservados.</p>
                <p>
                    <a href="#" class="text-decoration-none text-white">Política de Privacidad</a> |
                    <a href="#" class="text-decoration-none text-white">Términos de Servicio</a>
                </p>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white me-3" style="font-size: 1.5rem;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </footer>

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>