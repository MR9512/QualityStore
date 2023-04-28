<?php 
  
  class productosController{

    public function __construct(){
        require_once("Models/productosModel.php");
        $this->productosModel = new productosModel();
        $this->js = "assets/js/productos.js";
    }

    public function ver(){
        $respuesta = $this->productosModel->getProducto($_GET["producto"]);
        require_once("Views/templates/header.php");
        require_once("Views/productos/ver.php");
        require_once("Views/templates/footer.php");
    }

    public function listado(){
      $respuesta = $this->productosModel->getProductos();
      require_once("Views/templates/header.php");
      require_once("Views/templates/menu.php");
      require_once("Views/productos/listado.php");
      require_once("Views/templates/footer.php");
    }

    public function insertarProducto(){
        var_dump($_POST);
        var_dump($_FILES);
        exit();
        $respuesta = $this->productosModel->saveProducto($_POST);

      }
    }

  

?>