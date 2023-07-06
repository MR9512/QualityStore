<?php 
  require_once(__DIR__."/../core/coreController.php");
  class productosController extends coreController{
  
    public function __construct(){
        parent::__construct();
        require_once("Models/productosModel.php");
        require_once("Models/generalesModel.php");
        $this->productosModel = new productosModel();
        $this->generalesModel = new generalesModel();
        $this->js = "assets/js/listado.js";
    }

    public function ver(){
        $respuesta = $this->productosModel->getProducto($_GET["producto"]);
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
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
        $imagen = $_FILES["cargarImg"]["name"];
        
        $_POST["extensionImagen"] = str_replace("image/","",$_FILES["cargarImg"]["type"]);

        $respuesta = $this->productosModel->saveProducto($_POST);
        
        if($imagen != null && $imagen != ""){
          $temp = $_FILES["cargarImg"]["tmp_name"];
          $nombreImagen = $respuesta.".". $_POST["extensionImagen"];
          if(move_uploaded_file($temp, URLIMG.$nombreImagen)){
            if(file_exists(URLIMG.$nombreImagen)){
              chmod(URLIMG.$nombreImagen,0777);
              $retornar['mensaje'] ="Producto creado correctamente";
            }
          }
        }
        echo json_encode($retornar);
      }

      public function getProducto(){
        $respuesta = $this->productosModel->getProducto($_POST["id_producto"]);
        $respuesta["listaCategorias"] = $this->generalesModel->getCategoria();
        echo json_encode($respuesta);
      }

      public function updateProducto(){
        $_POST["status"] = 1;
        $respuesta = $this->productosModel->updateProducto($_POST);
        $resp["respuesta"] = 'Producto modificado correctamente';
        echo json_encode($resp);
      }
    
      public function deleteProducto(){
        $respuesta = $this->productosModel->deleteProducto($_POST["producto"]);
        $resp["respuesta"] = 'Producto eliminado correctamente';
        echo json_encode($resp);
      }

      public function categoria(){
        $respuesta = $this->productosModel->getProductos(1,$_GET['categoria']);
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/productos/categoria.php");
        require_once("Views/templates/footer.php");
      }
      
      public function searchProducto(){
        $respuesta = $this->productosModel->buscarProductos($_GET['buscarProducto']);
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/productos/searchProducto.php");
        require_once("Views/templates/footer.php");
      }
    }

  

?>