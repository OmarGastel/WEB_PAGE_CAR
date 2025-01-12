<?php
// Controlador/ImagenController.php

require_once "../Modelo/ImagenModel.php";

class ImagenController
{
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnregistrar"])) {
            $imagen = $_FILES["imagen"]["tmp_name"];
            $nombreImagen = $_FILES["imagen"]["name"];
            $tipoImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            $directorio = __DIR__ . "/../Archivo/";
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            if ($tipoImagen === "jpg" || $tipoImagen === "jpeg" || $tipoImagen === "png") {
                $imagenModel = new ImagenModel();
                $registro = $imagenModel->registrarImagen('', $descripcion, $precio);

                if ($registro) {
                    $idRegistro = $imagenModel->obtenerUltimoID();
                    $rutaRelativa = "Archivo/$idRegistro.$tipoImagen";
                    $rutaAbsoluta = $directorio . $idRegistro . "." . $tipoImagen;

                    if (move_uploaded_file($imagen, $rutaAbsoluta)) {
                        $imagenModel->actualizarRutaImagen($idRegistro, $rutaRelativa);
                        echo "<script>alert('Imagen registrada con éxito.'); window.location='../Vista/index.php';</script>";
                    } else {
                        echo "<script>alert('Error al mover la imagen al directorio.');</script>";
                    }
                } else {
                    echo "<script>alert('Error al registrar la imagen en la base de datos.');</script>";
                }
            } else {
                echo "<script>alert('Formato de imagen no válido. Solo JPG, JPEG y PNG.');</script>";
            }
        }
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnactualizar'])) {
            $id = $_POST['id'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];

            $imagenModel = new ImagenModel();
            if ($_FILES['imagen']['name']) {
                $nombreImagen = basename($_FILES['imagen']['name']);
                $rutaRelativa = "Archivo/$nombreImagen";
                $rutaAbsoluta = __DIR__ . "/../$rutaRelativa";

                $imagenActual = $imagenModel->obtenerImagenPorID($id);
                if (file_exists(__DIR__ . "/../" . $imagenActual->foto)) {
                    unlink(filename: __DIR__ . "/../" . $imagenActual->foto);
                }

                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaAbsoluta)) {
                    $imagenModel->actualizarImagen($id, $descripcion, $precio, $rutaRelativa);
                    echo "<script>alert('Registro actualizado correctamente.'); window.location='../Vista/index.php';</script>";
                } else {
                    echo "<script>alert('Error al subir la imagen.');</script>";
                }
            } else {
                $imagenModel->actualizarImagen($id, $descripcion, $precio);
                echo "<script>alert('Registro actualizado correctamente.'); window.location='../Vista/index.php';</script>";
            }
        }
    }
}
?>
