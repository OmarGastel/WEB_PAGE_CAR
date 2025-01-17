<?php
require_once "../Modelo/VehiculoModel.php";
require_once "../Controlador/PruebaController.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Instanciamos el modelo de Vehículo
$vehiculo = new Vehiculo();
// Ejecuta la consulta
$vehiculos = $vehiculo->obtenerTodos();

// Verifica si la consulta fue exitosa
if ($vehiculos === false) {
    echo "Error en la consulta: " . mysqli_error($conexion); // Muestra el error si hay uno
} else {
    // Verifica si hay resultados
    if (mysqli_num_rows($vehiculos) == 0) {
        echo "<tr><td colspan='10' class='text-center'>No se encontraron vehículos.</td></tr>";
    }
}

// Instanciamos el controlador de pruebas
$pruebaController = new PruebaController();
$pruebas = $pruebaController->obtenerPruebas();

// Manejo de formularios de pruebas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['eliminar_prueba'])) {
        $pruebaController->eliminarPrueba($_POST['id']);
        header("Location: crud.php");
        exit;
    } elseif (isset($_POST['registrar_prueba'])) {
        $pruebaController->registrarPrueba($_POST['auto_id'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['auto_seleccionado'], $_POST['fecha_prueba']);
        header("Location: crud.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/stiloss.css">
    <title>Dashboard de Vehículos</title>
</head>

<body>

    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-car'></i>
            <span class="text">AutoAdmin</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="crud.php">
                    <i class='bx bxs-car-garage'></i>
                    <span class="text">Vehículos</span>
                </a>
            </li>
            <li>
                <a href="usuarios.html">
                    <i class='bx bxs-user'></i>
                    <span class="text">Usuarios</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-chart'></i>
                    <span class="text">Estadísticas</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Configuración</span>
                </a>
            </li>
            <li>
                <a href="index.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Cerrar Sesión</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categorías</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Buscar...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">3</span>
            </a>
            <a href="#" class="profile">
                <img src="https://cdn.onlinewebfonts.com/svg/img_266351.png" alt="profile">
            </a>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard de Vehículos</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Inicio</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="#">Vehículos</a></li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Subir Archivo</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-car'></i>
                    <span class="text">
                        <h3>150</h3>
                        <p>Vehículos en venta</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-user'></i>
                    <span class="text">
                        <h3>200</h3>
                        <p>Usuarios registrados</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-bar-chart-alt-2'></i>
                    <span class="text">
                        <h3>45</h3>
                        <p>Ventas este mes</p>
                    </span>
                </li>
            </ul>

            <h1 class="text-center text-secondary fw-bold p-4">PANEL DE VEHÍCULOS</h1>
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
                    <?php if ($vehiculos && mysqli_num_rows($vehiculos) > 0) { ?>
                        <?php while ($vehiculo = mysqli_fetch_assoc($vehiculos)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($vehiculo['id']) ?></td>
                                <td><img src="../<?= htmlspecialchars($vehiculo['foto']) ?>" alt="Vehículo"
                                        style="width:100px;"></td>
                                <td><?= htmlspecialchars($vehiculo['marca']) ?></td>
                                <td><?= htmlspecialchars($vehiculo['modelo']) ?></td>
                                <td><?= htmlspecialchars($vehiculo['anio']) ?></td>
                                <td><?= htmlspecialchars($vehiculo['transmision']) ?></td>
                                <td><?= number_format($vehiculo['cilindraje'], 2) ?></td>
                                <td><?= number_format($vehiculo['kilometraje'], 2) ?> km</td>
                                <td><?= htmlspecialchars($vehiculo['motor']) ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $vehiculo['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="../Controlador/EliminarController.php?id=<?= $vehiculo['id'] ?>"
                                        class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="10" class="text-center">No se encontraron vehículos.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h1 class="text-center text-secondary fw-bold p-4">PANEL DE PRUEBAS AGENDADAS</h1>
            <form method="POST" class="mb-4">
                <label for="auto_id">ID del Auto:</label>
                <input type="number" name="auto_id" id="auto_id" required>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" required>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" required>
                <label for="auto_seleccionado">Auto Seleccionado:</label>
                <input type="text" name="auto_seleccionado" id="auto_seleccionado" required>
                <label for="fecha_prueba">Fecha de Prueba:</label>
                <input type="date" name="fecha_prueba" id="fecha_prueba" required>
                <button type="submit" name="registrar_prueba" class="btn btn-primary">Registrar Prueba</button>
            </form>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>ID Auto</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Auto Seleccionado</th>
                        <th>Fecha de Prueba</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($pruebas && mysqli_num_rows($pruebas) > 0) { ?>
                        <?php while ($prueba = mysqli_fetch_assoc($pruebas)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($prueba['id']) ?></td>
                                <td><?= htmlspecialchars($prueba['auto_id']) ?></td>
                                <td><?= htmlspecialchars($prueba['nombre']) ?></td>
                                <td><?= htmlspecialchars($prueba['apellido']) ?></td>
                                <td><?= htmlspecialchars($prueba['telefono']) ?></td>
                                <td><?= htmlspecialchars($prueba['auto_seleccionado']) ?></td>
                                <td><?= htmlspecialchars($prueba['fecha_prueba']) ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $prueba['id'] ?>">
                                        <button type="submit" name="eliminar_prueba"
                                            class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">No se encontraron pruebas agendadas.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h1 class="text-center text-secondary fw-bold p-4">PANEL DE IMÁGENES</h1>
            <form method="POST" enctype="multipart/form-data" class="mb-4">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" required>
                <label for="description">Descripción:</label>
                <input type="text" name="description" id="description" required>
                <label for="price">Precio:</label>
                <input type="number" step="0.01" name="price" id="price" required>
                <button type="submit" name="registrar_imagen" class="btn btn-primary">Registrar Imagen</button>
            </form>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($imagenes && mysqli_num_rows($imagenes) > 0) { ?>
                        <?php while ($imagen = mysqli_fetch_assoc($imagenes)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($imagen['id_img']) ?></td>
                                <td><img src="../<?= htmlspecialchars($imagen['foto']) ?>" alt="Imagen" style="width:100px;">
                                </td>
                                <td><?= htmlspecialchars($imagen['description']) ?></td>
                                <td>$<?= number_format($imagen['price'], 2) ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="id_img" value="<?= $imagen['id_img'] ?>">
                                        <button type="submit" name="eliminar_imagen"
                                            class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    <a href="editar_imagen.php?id_img=<?= $imagen['id_img'] ?>"
                                        class="btn btn-warning btn-sm">Editar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">No se encontraron imágenes.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>