<?php 
 
 class Conect{
    public function conexion(){
        $con = mysqli_connect("localhost","root","","qualitystore");
        if(!$con){
           echo "Error de conexión";
        }else{
            return $con;
        }
    }
 }

?>