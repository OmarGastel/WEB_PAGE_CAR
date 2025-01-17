<?php
class ImgController {
    private $imgModel;

    public function __construct() {
        $this->imgModel = new ImgModel();
    }

    public function obtenerImagenes() {
        return $this->imgModel->obtenerTodas();
    }

    public function registrarImagen($foto, $description, $price) {
        $this->imgModel->insertarImagen($foto, $description, $price);
    }

    public function editarImagen($id, $foto, $description, $price) {
        $this->imgModel->actualizarImagen($id, $foto, $description, $price);
    }

    public function eliminarImagen($id) {
        $this->imgModel->borrarImagen($id);
    }
}
?>