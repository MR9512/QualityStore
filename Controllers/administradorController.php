<?php 
require_once (__DIR__."/../core/coreController.php");
class administradorController extends coreController{
    public function __construct(){
      require_once("Models/administradorModel.php");
      require_once("Models/generalesModel.php");
      require_once("Models/productosModel.php");
      $this->administradorModel = new administradorModel();
      $this->generalesModel = new generalesModel();
      $this->productosModel = new productosModel();
      $this->js = "assets/js/administrador.js";
    }

    public function misProductosVendidos(){
        $respuesta['roles'] = $this->generalesModel->getRoles();
        $respuesta['categorias'] = $this->generalesModel->getCategoria();
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/administrador/misProductosVendidos.php");
        require_once("Views/templates/footer.php");
    }

    public function getProducto(){
        $respuesta = $this->productosModel->getProductos(1,$_POST['id_categoria']);
        echo json_encode($respuesta);
      }

      public function getUsuarios(){
        $respuesta = $this->administradorModel->getUsuarios($_POST['id_rol']);
        echo json_encode($respuesta);
      }

      public function getprecio(){
        $respuesta = $this->administradorModel->getPrecio($_POST['id_producto']);
        echo json_encode($respuesta);
      }



}

?>