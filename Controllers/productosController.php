<?php 
  
  class productosController{

    public function __construct(){
        require_once("Models/productosModel.php");
        $this->productosModel = new productosModel();
        $this->js = "assets/js/listado.js";
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
        $imagen = $_FILES["cargarImg"]["name"];
        
        $_POST["extensionImagen"] = str_replace("image/","",$_FILES["cargarImg"]["type"]);

        $respuesta = $this->productosModel->saveProducto($_POST);
        
        if($imagen != null && $imagen != ""){
          $temp = $_FILES["cargarImg"]["tmp_name"];
          $nombreImagen = $respuesta.".". $_POST["extensionImagen"];
          if(move_uploaded_file($temp, URLIMG.$nombreImagen)){
            chmod(URLIMG.$imagen,0777);
          }
        }
      }

      public function getProducto(){
        $respuesta = $this->productosModel->getProducto($_POST["id_producto"]);
        $respuesta["listaCategorias"] = $this->productosModel->getCategoria();
        echo json_encode($respuesta);
      }

      public function updateProducto(){
        $_POST["status"] = 1;
        $respuesta = $this->productosModel->updateProducto($_POST);
        echo json_encode($respuesta);
      }

      
    }

  

?>