<?php 
  require_once(__DIR__."/../core/coreController.php");
  class homeController extends coreController{
 
    public function __construct(){
      parent::__construct();
      require_once("Models/productosModel.php");
      $this->productosModel = new productosModel();
  }

  public function index(){
      $respuesta = $this->productosModel->getProductos(1);
      require_once("Views/templates/header.php");
      require_once("Views/templates/menu.php");
      require_once("Views/home/index.php");
      require_once("Views/templates/footer.php");
  }

  }

?>