<?php 

 class productosModel{

    public function __construct(){
        require_once("DB/Conect.php");
        $con = new Conect();
        $this->con = $con->conexion();
    }

    public function getProductos(){
        $query = "SELECT * FROM productos";
        $res = mysqli_query($this->con, $query);
        if(mysqli_num_rows($res) > 0){
            $i = 0;
           while($row = mysqli_fetch_assoc($res)){
               $data["id_producto"][$i] = $row["id_producto"];
               $data["nombre"][$i] = $row["nombre"];
               $data["precio"][$i] = $row["precio"];
               $data["desc_large"][$i] = $row["desc_large"];
               $data["desc_corta"][$i] = $row["desc_corta"];
               $data["url_imagen"][$i] = $row["url_imagen"];
               $data["url_mercado"][$i] = $row["url_mercado"];
               $data["url_sams"][$i] = $row["url_sams"];
               $data["id_usuario"][$i] = $row["id_usuario"];
               $data["status"][$i] = $row["status"];
               $data["fecha_subida"][$i] = $row["fecha_subida"];
               $i++;
           }
        } else {
            $data["error"] = "No se encontraron registros";
        }
        return $data;
    }

 }

?>