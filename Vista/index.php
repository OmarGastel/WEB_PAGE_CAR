<?php
require_once __DIR__ . '/../Controlador/LandingController.php';

$controller = new LandingController();
$imagenes = $controller->getImages();
$autos = $controller->getImages();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Autocar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#slider">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#autos">Autos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonios">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Slider -->
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $isFirst = true;
            foreach ($imagenes as $imagen): ?>
                <div class="carousel-item <?= $isFirst ? 'active' : ''; ?>">
                    <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($imagen['foto']); ?>" class="d-block w-100" alt="Imagen">
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
    <section id="autos" class="container my-5">
        <h2 class="text-center mb-4">Autos Disponibles</h2>
        <div class="row">
            <?php foreach ($autos as $auto): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/WEB_PAGE_CAR/<?= htmlspecialchars($auto['foto']); ?>" class="card-img-top" alt="Auto">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($auto['description']); ?></h5>
                            <p class="card-text">Precio: $<?= number_format($auto['price'], 2); ?></p>
                            <button class="btn btn-primary btn-agendar" data-id="<?= $auto['id_img']; ?>">Agendar
                                Prueba</button>
                            <a href="detalle_auto.php?id=<?= $auto['id_img']; ?>" class="btn btn-secondary">Ver Más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios" class="bg-light py-5">
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
                        <p>"Gran servicio y atención personalizada."</p>
                        <footer class="blockquote-footer">Carlos Martínez</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQs -->
    <section id="faq" class="container py-5">
        <h2 class="text-center mb-4">Preguntas Frecuentes</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cómo agendar una prueba?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        Puedes agendar una prueba seleccionando el auto y completando el formulario en línea.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq2">
                        ¿Dónde están ubicados?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Estamos en múltiples ubicaciones. Consulta nuestra sección de contacto para más información.
                    </div>
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
                <p><a href="#">Política de Privacidad</a> | <a href="#">Términos de Servicio</a></p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>