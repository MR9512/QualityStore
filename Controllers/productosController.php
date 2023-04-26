<?php 
  
  class productosController{

    public function __construct(){
        require_once("Models/productosModel.php");
        $this->productosModel = new productosModel();
    }

    public function ver(){
        $respuesta = $this->productosModel->getProductos();
        require_once("Views/templates/header.php");
        require_once("Views/productos/ver.php");
        require_once("Views/templates/footer.php");
    }


  }

?>