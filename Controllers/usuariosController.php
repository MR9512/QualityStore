<?php 
  require_once(__DIR__."/../core/coreController.php");
  class usuariosController extends coreController{
  
    public function __construct(){
        parent::__construct();
        require_once("Models/usuariosModel.php");
        require_once("Models/generalesModel.php");
        $this->usuariosModel = new usuariosModel();
        $this->generalesModel = new generalesModel();
        $this->rol = $this->generalesModel->getRoles();
        $this->js = "assets/js/listadoUsuario.js";
    }

    public function ver(){
        $respuesta = $this->usuariosModel->getUsuario($_GET["usuario"]);
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/usuarios/ver.php");
        require_once("Views/templates/footer.php");
    }

     public function listado(){

       $respuesta = $this->usuariosModel->getUsuarios();
       require_once("Views/templates/header.php");
       require_once("Views/templates/menu.php");
       require_once("Views/usuarios/listado.php");
       require_once("Views/templates/footer.php");
       
     }

     public function insertarUsuario(){
     
       $respuesta = $this->usuariosModel->saveUsuario($_POST);
       $retornar['mensaje'] ="Usuario creado correctamente";
       echo json_encode($retornar);  

      }

      public function getUsuario(){
        $respuesta = $this->usuariosModel->getUsuario($_POST["id_usuario"]);
        $respuesta["listaUsuarios"] = $this->generalesModel->getRoles();
        echo json_encode($respuesta);
      }

      public function updateUsuario(){
        $_POST["status"] = 1;
        $respuesta = $this->usuariosModel->updateUsuario($_POST);
        $resp["respuesta"] = 'Usuario modificado correctamente';
        echo json_encode($resp);
      }
    
      public function deleteUsuario(){
        $respuesta = $this->usuariosModel->deleteUsuario($_POST["id_usuario"]);
        $resp["respuesta"] = 'Usuario eliminado correctamente';
        echo json_encode($resp);
      }
      
      public function searchUsuario(){
        $respuesta = $this->usuariosModel->buscarUsuarios($_GET['buscarUsuario']);
        require_once("Views/templates/header.php");
        require_once("Views/templates/menu.php");
        require_once("Views/productos/searchProducto.php");
        require_once("Views/templates/footer.php");
      }


    }

  

?>