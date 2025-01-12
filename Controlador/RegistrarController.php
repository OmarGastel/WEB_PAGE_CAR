<?php
require_once "../Modelo/ImagenModel.php";

if (!empty($_POST["btnregistrar"])) {
    try {
        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombreImagen = $_FILES["imagen"]["name"];
        $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
        $descripcion = htmlspecialchars($_POST['descripcion'], ENT_QUOTES, 'UTF-8');
        $precio = floatval($_POST['precio']);
        $directorio = __DIR__ . "/../Archivo/";

        // Verifica si el directorio existe y tiene permisos de escritura
        if (!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        if (!is_writable($directorio)) {
            throw new Exception("El directorio no tiene permisos de escritura.");
        }

        // Valida el formato de la imagen
        if (in_array($tipoImagen, ["jpg", "jpeg", "png"])) {
            $imagenModel = new ImagenModel();
            $registro = $imagenModel->registrarImagen("", $descripcion, $precio);

            if ($registro) {
                $idRegistro = $imagenModel->obtenerUltimoID();
                $rutaRelativa = "Archivo/$idRegistro.$tipoImagen";
                $rutaAbsoluta = $directorio . $idRegistro . "." . $tipoImagen;

                if (move_uploaded_file($imagen, $rutaAbsoluta)) {
                    $imagenModel->actualizarRutaImagen($idRegistro, $rutaRelativa);
                    echo "<script>
                            alert('Imagen registrada con éxito.');
                            window.location='../Vista/index.php';
                          </script>";
                } else {
                    throw new Exception("Error al mover la imagen al directorio.");
                }
            } else {
                throw new Exception("Error al registrar la imagen en la base de datos.");
            }
        } else {
            throw new Exception("Formato de imagen no válido. Solo JPG, JPEG y PNG.");
        }
    } catch (Exception $e) {
        echo "<script>
                alert('{$e->getMessage()}');
                window.history.back();
              </script>";
    }
}
?>
