<?php
class loginController
{
    public function __construct()
    {
        require_once "Models/loginModel.php";
        $this->loginModel = new loginModel();
        $this->urlCSS = "../assets/css/style.css";
        $this->js = "assets/js/usuarios.js";
    }
    public function registrar(){
        
        require_once "views/templates/header.php";
        require_once "views/login.php";
        require_once "views/templates/footer.php";

    }

    public function save(){
        $this->loginModel->saveUser($_POST); 
    }
    public function ingresar()
    {
        $resp = $this->loginModel->getRoles();
        if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
            $resp = $this->loginModel->validar($_POST);
            if (isset($resp["id_usuario"])) {
                session_start();
                $_SESSION = $resp;
                header("Location:../home/index");
            }
        }
        require_once "views/templates/header.php";
        require_once "views/login.php";
        require_once "views/templates/footer.php";
    }
}
