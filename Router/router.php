<?php 

   class Router{

    private $controller;
    private $method;

    public function __construct(){
        $this -> matchRoute();
    }

    public function matchRoute(){
        $URL = explode("/",URL);
        $this->controller = $URL[1];
        $metodo = explode("?",$URL[2]);
        if($URL[2] == ""){
            $this->method = "index";
        }else{
            $this->method = $metodo[0];
        }
       
        $this->controller = $this->controller."Controller";
        require_once("Controllers/".$this->controller.".php");
    }

    public function run(){
        $controller = new $this->controller();
        $metodo = $this->method;
        $controller->$metodo();
    }
   }

?>