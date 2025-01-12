<?php
require_once "../Modelo/Imagen.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $imagenModel = new Imagen();

    if ($imagenModel->eliminar($id)) {
        echo "<script>alert('Registro eliminado correctamente'); window.location='../Vista/index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro'); window.location='../Vista/index.php';</script>";
    }
}
?>
