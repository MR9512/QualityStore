<?php 

  class homeController{
 
    public function __construct(){
      require_once("Models/productosModel.php");
      $this->productosModel = new productosModel();
  }

  public function index(){
      $respuesta = $this->productosModel->getProductos();
      require_once("Views/templates/header.php");
      require_once("Views/home/index.php");
      require_once("Views/templates/footer.php");
  }

  }

?>