<?php 
 class coreController{
    public function __construct(){
       require_once("Models/generalesModel.php");  
       $generalesModel = new generalesModel();
       $this->categoria = $generalesModel->getCategoria();
    }
    
 }

?>