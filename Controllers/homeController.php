<?php 

  class homeController{
 
    public function __construct(){
       
    }
    
    public function index(){
      require_once("Views/templates/header.php");
      require_once("Views/home/index.php");
      require_once("Views/templates/footer.php");
    }

  }

?>